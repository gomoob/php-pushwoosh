<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh;

use Gomoob\Pushwoosh\Curl\ICurlRequest;

/**
 * Interface which defines a CURL client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
interface ICURLClient
{
    /**
     * The default root URL to the API server used in the library.
     *
     * @var string
     */
    const DEFAULT_API_URL = 'https://cp.pushwoosh.com/json/1.3';

    /**
     * Gets the root URL of the API server to use, if this parameter is not provided then the default API URL will be
     * equal to `https://cp.pushwoosh.com/json/1.3`. If you have an enterprise Pushwoosh plan then you have a dedicated
     * API server URL like `https://your-company.pushwoosh.com`, you can provide this custom API server URL here.
     *
     * @return string the root URL of the API server which is in use.
     */
    public function getApiUrl();

    /**
     * Gets the CURL Request object currently in use.
     *
     * @return \Gomoob\Pushwoosh\Curl\ICurlRequest The CURL request object currently in use.
     */
    public function getCurlRequest();

    /**
     * Function used to call a Pushwoosh Web Service.
     *
     * @param string $method the name of the Pushwoosh Web Service method to call, this parameter can take the following
     *        values :
     *            - createMessage
     *            - deleteMessage
     *            - getNearestZone
     *            - pushStat
     *            - registerDevice
     *            - setBadge
     *            - setTags
     *          - unregisterDevice
     * @param array  $data   a PHP array which can be converted to JSON using the PHP 'json_encode(...)' method.
     *
     * @return array the result of the request as a PHP array, this array is transformed from a Pushwoosh JSON response
     *         using the 'json_decode(...)' PHP function.
     */
    public function pushwooshCall($method, array $data);

    /**
     * Sets the the root URL of the API server to use, if this parameter is not provided then the default API URL will
     * be equal to `https://cp.pushwoosh.com/json/1.3`. If you have an enterprise Pushwoosh plan then you have a
     * dedicated API server URL like `https://your-company.pushwoosh.com`, you can provide this custom API server URL
     * here.
     *
     * @param string $apiUrl the root URL of the API server to use.
     */
    public function setApiUrl($apiUrl);

    /**
     * Sets the CURL request object to be used.
     *
     * @param \Gomoob\Pushwoosh\Curl\ICurlRequest $curlRequest The CURL request object to use.
     */
    public function setCurlRequest(ICurlRequest $curlRequest);
}
