<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh RegisterDevice response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class RegisterDeviceResponse
{
    /**
	 * The Pushwoosh status code, the Pushwoosh API can return the following register device status codes :
	 * 	- 200	: (HTTP Status Code = 200) Device successfully registered.
	 *  - 210	: (HTTP Status Code = 200) Argument error. See statusMessage for more info.
	 *  - 400	: (HTTP Status Code = N/A) Malformed request string.
	 *  - 500	: (HTTP Status Code = 500) Internal error.
	 *
	 * @var int
	 */
    private $statusCode;

    /**
	 * Gets the Pushwoosh status message.
	 *
	 * @var string
	 */
    private $statusMessage;

    /**
	 * Utility function used to create a new instance from a JSON string.
	 *
	 * @param array $json a PHP array which contains the result of a 'json_decode' execution.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Response\RegisterDeviceResponse the resulting instance.
	 */
    public static function create(array $json)
    {
        $registerDeviceResponse = new RegisterDeviceResponse();
        $registerDeviceResponse->setStatusCode($json['status_code']);
        $registerDeviceResponse->setStatusMessage($json['status_message']);

        return $registerDeviceResponse;

    }

    /**
	 * Gets the Pushwoosh status code, the Pushwoosh API can return the following register device status codes :
	 * 	- 200	: (HTTP Status Code = 200) Device successfully registered.
	 *  - 210	: (HTTP Status Code = 200) Argument error. See statusMessage for more info.
	 *  - 400	: (HTTP Status Code = N/A) Malformed request string.
	 *  - 500	: (HTTP Status Code = 500) Internal error.
	 *
	 * @return int the Pushwoosh status code.
	 */
    public function getStatusCode()
    {
        return $this->statusCode;

    }

    /**
	 * Gets the Pushwoosh status message.
	 *
	 * @return string the Pushwoosh status message.
	 */
    public function getStatusMessage()
    {
        return $this->statusMessage;

    }

    /**
	 * Function used to indicate if the response represents a success.
	 *
	 * @return boolean true if the response represents a success, false otherwise.
	 */
    public function isOk()
    {
        return $this->statusCode === 200;

    }

    /**
	 * Sets the Pushwoosh status code, the Pushwoosh API can return the following register device status codes :
	 * 	- 200	: (HTTP Status Code = 200) Device successfully registered.
	 *  - 210	: (HTTP Status Code = 200) Argument error. See statusMessage for more info.
	 *  - 400	: (HTTP Status Code = N/A) Malformed request string.
	 *  - 500	: (HTTP Status Code = 500) Internal error.
	 *
	 * @param string $statusCode the Pushwoosh status code to set.
	 */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

    }

    /**
	 * Sets the Pushwoosh status message.
	 *
	 * @param string $statusMessage the Pushwoosh status message to set.
	 */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;

    }
}
