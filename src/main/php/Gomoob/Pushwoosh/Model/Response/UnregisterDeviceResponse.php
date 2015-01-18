<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh UnregisterDevice response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class UnregisterDeviceResponse extends AbstractResponse
{
    /**
     * Utility function used to create a new instance from a JSON string.
     *
     * @param array $json a PHP array which contains the result of a 'json_decode' execution.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\RegisterDeviceResponse the resulting instance.
     */
    public static function create(array $json)
    {
        $unregisterDeviceResponse = new UnregisterDeviceResponse();
        $unregisterDeviceResponse->setStatusCode($json['status_code']);
        $unregisterDeviceResponse->setStatusMessage($json['status_message']);

        return $unregisterDeviceResponse;
    }
}
