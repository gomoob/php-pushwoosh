<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh;

/**
 * Interface which defines a CURL client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
interface ICURLClient
{
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
}
