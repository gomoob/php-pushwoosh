<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\ICURLClient;
use Gomoob\Pushwoosh\Curl\CurlRequest;
use Gomoob\Pushwoosh\Curl\ICurlRequest;
use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Class which defines a CURL client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CURLClient implements ICURLClient
{
    /**
     * The root URL of the API server to use, if this parameter is not provided then the default API URL will be equal
     * to `https://cp.pushwoosh.com/json/1.3`. If you have an enterprise Pushwoosh plan then you have a dedicated API
     * server URL like `https://your-company.pushwoosh.com`, you can provide this custom API server URL here.
     *
     * @var string
     */
    private $apiUrl = ICURLClient::DEFAULT_API_URL;

    /**
     * The CURL Request object currently in use.
     *
     * @var \Gomoob\Pushwoosh\Curl\ICurlRequest
     */
    private $curlRequest;

    /**
     * The default CURL options to use at request time.
     *
     * @var array
     */
    private $defaultCurlOpts = [];

    /**
     * Creates a new CURL client instance.
     *
     * @param string $apiUrl (Optional) the root URL of the API server to use, if this parameter is not provided then
     *        the default API URL will be equal to `https://cp.pushwoosh.com/json/1.3`. If you have an enterprise
     *        Pushwoosh plan then you have a dedicated API server URL like `https://your-company.pushwoosh.com`, you can
     *        provide this custom API server URL here.
     */
    public function __construct($apiUrl = ICURLClient::DEFAULT_API_URL)
    {
        $this->apiUrl = $apiUrl;
        $this->curlRequest = new CurlRequest();
    }

    /**
     * {@inheritDoc}
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Gets the CURL Request object currently in use.
     *
     * @return \Gomoob\Pushwoosh\Curl\ICurlRequest The CURL request object currently in use.
     */
    public function getCurlRequest()
    {
        return $this->curlRequest;
    }

    /**
     * {@inheritDoc}
     */
    public function pushwooshCall($method, array $data)
    {
        // Creates the absolute Web Service URL to call, here we first remove trailing '/' characters to be sure the URL
        // is well formed
        $url = rtrim($this->apiUrl, '/') . '/' . $method;

        // Creates the JSON request to POST
        $request = json_encode(['request' => $data]);

        // Initialize the CURL request
        $this->curlRequest->init($url);

        // Apply CURL options
        foreach ($this->createMergedCurlOpts($request) as $option => $value) {
            $this->curlRequest->setOpt($option, $value);
        }

        // Executes the CURL request
        $response = $this->curlRequest->exec();

        // Retrieves potential errors
        $error = $this->curlRequest->error();

        // If an error has been encountered
        if ($error) {
            // Get additional informations about the failed CURL transfert
            $info = $this->curlRequest->getInfo();

            // Close the CURL handle
            $this->curlRequest->close();

            throw new PushwooshException(
                'CURL error encountered while requesting the Pushwoosh web services using CURL !',
                -1,
                null,
                [
                    'curl_error' => $error,
                    'curl_info' => $info,
                    'response' => $response
                ]
            );
        }

        $jsonResult = json_decode($response, true);

        // This should never append but we want to be 100% sure our response is well formatted for the PHP Pushwoosh
        // APIs. If its not the case we throw an exception with as much details as possible.
        if (!is_array($jsonResult)) {
            // Get additional informations about the failed CURL transfert
            $info = $this->curlRequest->getInfo();

            // Close the CURL handle
            $this->curlRequest->close();

            throw new PushwooshException(
                'Bad response encountered while requesting the Pushwoosh web services using CURL !',
                -1,
                null,
                [
                    'curl_info' => $info,
                    'response' => $response
                ]
            );
        }

        // Close the CURL handle
        $this->curlRequest->close();

        return $jsonResult;
    }

    /**
     * {@inheritDoc}
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * Sets the CURL request object to be used.
     *
     * @param \Gomoob\Pushwoosh\Curl\ICurlRequest $curlRequest The CURL request object to use.
     */
    public function setCurlRequest(ICurlRequest $curlRequest)
    {
        $this->curlRequest = $curlRequest;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultCurlOpt($option, $value)
    {
        $this->defaultCurlOpts[$option] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultCurlOpts(array $defaultCurlOpts)
    {
        $this->defaultCurlOpts = $defaultCurlOpts;
    }

    /**
     * Utility function used to create a set of CURL options from default CURL options defined on the CURL client and
     * not overwritable CURL options.
     *
     * @param array $request the request to POST to the Pushwoosh Web Services.
     *
     * @return array the resulting CURL options to use.
     */
    private function createMergedCurlOpts($request)
    {
        // Merge default CURL options with overwritable CURL options
        $mergedCurlOpts = array_merge(
            [
                // FIXME: FIX THIS !!!
                // see: http://curl.haxx.se/docs/sslcerts.html
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0
                // $curlRequest->setOpt(CURLOPT_SSL_VERIFYPEER, true);
            ],
            $this->defaultCurlOpts
        );

        // Set not overwritable CURL options
        $mergedCurlOpts[CURLOPT_RETURNTRANSFER] = true;
        $mergedCurlOpts[CURLOPT_ENCODING] = 'gzip, deflate';
        $mergedCurlOpts[CURLOPT_POST] = true;
        $mergedCurlOpts[CURLOPT_POSTFIELDS] = $request;
        $mergedCurlOpts[CURLOPT_HTTPHEADER] = [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($request)
        ];

        return $mergedCurlOpts;
    }
}
