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
     * The CURL Request object currently in use.
     *
     * @var \Gomoob\Curl\ICurlRequest
     */
    private $curlRequest;
    
    /**
     * Creates a new CURL client instance.
     */
    public function __construct()
    {
        $this->curlRequest = new CurlRequest();
    }
    
    /**
     * Gets the CURL Request object currently in use.
     *
     * @return \Gomoob\Curl\ICurlRequest The CURL request object currently in use.
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
        $url = 'https://cp.pushwoosh.com/json/1.3/' . $method;
        $request = json_encode(array('request' => $data));

        $this->curlRequest->init($url);

        // FIXME: FIX THIS !!!
        // see: http://curl.haxx.se/docs/sslcerts.html
        $this->curlRequest->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
        $this->curlRequest->setOpt(CURLOPT_SSL_VERIFYPEER, 0);

        $this->curlRequest->setOpt(CURLOPT_RETURNTRANSFER, true);
        // $curlRequest->setOpt(CURLOPT_SSL_VERIFYPEER, true);
        $this->curlRequest->setOpt(CURLOPT_ENCODING, 'gzip, deflate');
        $this->curlRequest->setOpt(CURLOPT_POST, true);
        $this->curlRequest->setOpt(CURLOPT_POSTFIELDS, $request);
        $this->curlRequest->setOpt(
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request)
            )
        );

        $response = $this->curlRequest->exec();

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
                array(
                    'curl_error' => $error,
                    'curl_info' => $info
                )
            );

        }

        $jsonResult = json_decode($response, true);
        
        // This should never append but we want to be 100% sure our response is well formatted for the PHP Pushwoosh
        // APIs. If its not the case we throw an exception with as much details as possible.
        if (!is_array($jsonResult)) {
            // Get additional informations about the failed CURL transfert
            $info = $this->curlRequest->getInfo();
            
            throw new PushwooshException(
                'Bad response encountered while requesting the Pushwoosh web services using CURL !',
                -1,
                null,
                array(
                    'curl_info' => $info
                )
            );
            
            // Close the CURL handle
            $this->curlRequest->close();
            
        }
        
        // Close the CURL handle
        $this->curlRequest->close();
        
        return $jsonResult;
        
    }
    
    /**
     * Sets the CURL request object to be used.
     *
     * @param \Gomoob\Curl\ICurlRequest $curlRequest The CURL request object to use.
     */
    public function setCurlRequest(ICurlRequest $curlRequest)
    {
        $this->curlRequest = $curlRequest;
    }
}
