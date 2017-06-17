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
     * Gets the additional CURL options to be used while requesting the Pushwoosh Web Services. This method can be used
     * when you want to customize the behavior of CURL at request time.
     *
     * In most cases using this method is absolutly not necessary because the `php-pushwoosh` is configured with best
     * settings to work correctly. However sometimes, depending on your environment and on the characteristics
     * of you servers you'll need to overwrite some CURL settings.
     *
     * Please note that this method will only allow to overwrite the CURL parameters which are not strictly necessary to
     * call the Pushwoosh Web Services. If you try to overwrite a CURL parameter which would lead to bad Web Services
     * calls this method will throw an explicit exception.
     *
     * @return array an array which maps CURL option name to CURL option values.
     */
    public function getAdditionalCurlOpts();

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
     * Sets an additional CURL option to be used while requesting the Pushwoosh Web Services. This method can be used
     * when you want to customize the behavior of CURL at request time.
     *
     * In most cases using this method is absolutly not necessary because the `php-pushwoosh` is configured with best
     * settings to work correctly. However sometimes, depending on your environment and on the characteristics
     * of you servers you'll need to overwrite some CURL settings.
     *
     * Please note that this method will only allow to overwrite the CURL parameters which are not strictly necessary to
     * call the Pushwoosh Web Services. If you try to overwrite a CURL parameter which would lead to bad Web Services
     * calls this method will throw an explicit exception.
     *
     * @param int $option the CURL option to set.
     * @param mixed $value tha value of the CURL option to set.
     *
     * @throws \Gomoob\Pushwoosh\Exception\PushwooshException if one of the CURL option provided cannot be overwritten.
     */
    public function setAdditionalCurlOpt($option, $value);

    /**
     * Sets the additional CURL options to be used while requesting the Pushwoosh Web Services. This method can be used
     * when you want to customize the behavior of CURL at request time.
     *
     * In most cases using this method is absolutly not necessary because the `php-pushwoosh` is configured with best
     * settings to work correctly. However sometimes, depending on your environment and on the characteristics
     * of you servers you'll need to overwrite some CURL settings.
     *
     * Please not that this method will only allow to overwrite the CURL parameters which are not strictly necessary to
     * call the Pushwoosh Web Services. If you try to overwrite a CURL parameter which would lead to bad Web Services
     * calls this method will throw an explicit exception.
     *
     * @param array $defaultCurlOpts an array which maps CURL option name to CURL option values.
     *
     * @throws \Gomoob\Pushwoosh\Exception\PushwooshException if one of the CURL option provided cannot be overwritten.
     */
    public function setAdditionalCurlOpts(array $defaultCurlOpts);

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
