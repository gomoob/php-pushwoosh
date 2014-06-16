<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/createMessage' response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-create
 */
class CreateMessageResponse {

	/**
	 * Gets the Pushwoosh response.
	 *
	 * @var \Gomoob\Pushwoosh\Model\Response\CreateMessageResponseResponse
	 */
	private $response;

	/**
	 * The Pushwoosh status code, the Pushwoosh API can return the following create message status codes :
	 * 	- 200	: (HTTP Status Code = 200) Message succesfully created.
	 *  - 210	: (HTTP Status Code = 200) Argument error. See statusMessage for more info.
	 *  - 400	: (HTTP Status Code = N/A) Malformed request string.
	 *  - 500	: (HTTP Status Code = 500) Internal error.
	 *
	 * @var int
	 */
	private $statusCode;

	/**
	 * The Pushwoosh status message.
	 *
	 * @var string
	 */
	private $statusMessage;

	/**
	 * Utility function used to create a new instance from a JSON string.
	 *
	 * @param array $json a PHP array which contains the result of a 'json_decode' execution.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Response\CreateMessageResponse the resulting instance.
	 */
	public static function create(array $json) {

		$createMessageResponse = new CreateMessageResponse();
		$createMessageResponse -> setStatusCode($json['status_code']);
		$createMessageResponse -> setStatusMessage($json['status_message']);

		$createMessageResponseResponse = new CreateMessageResponseResponse();
		$createMessageResponseResponse -> setMessages($json['response']['Messages']);
		$createMessageResponse -> setResponse($createMessageResponseResponse);

		return $createMessageResponse;

	}

	/**
	 * Gets the Pushwoosh response.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Response\CreateMessageResponseResponse the Pushwoosh response.
	 */
	public function getResponse() {

		return $this -> response;

	}

	/**
	 * Gets the Pushwoosh status code, , the Pushwoosh API can return the following create message status codes :
	 * 	- 200	: (HTTP Status Code = 200) Message succesfully created.
	 *  - 210	: (HTTP Status Code = 200) Argument error. See statusMessage for more info.
	 *  - 400	: (HTTP Status Code = N/A) Malformed request string.
	 *  - 500	: (HTTP Status Code = 500) Internal error.
	 *
	 * @return int the Pushwoosh status code.
	 */
	public function getStatusCode() {

		return $this -> statusCode;

	}

	/**
	 * Gets the Pushwoosh status message.
	 *
	 * @return string the Pushwoosh status message.
	 */
	public function getStatusMessage() {

		return $this -> statusMessage;

	}

	/**
	 * Function used to indicate if the response represents a success.
	 *
	 * @return boolean true if the response represents a success, false otherwise.
	 */
	public function isOk() {

		return $this -> statusCode === 200;

	}

	/**
	 * Sets the Pushwoosh response.
	 *
	 * @param \Gomoob\Pushwoosh\Model\Response\CreateMessageResponseResponse $response the Pushwoosh response.
	 */
	public function setResponse($response) {

		$this -> response = $response;

	}

	/**
	 * Sets the Pushwoosh status code, the Pushwoosh API can return the following create message status codes :
	 * 	- 200	: (HTTP Status Code = 200) Message succesfully created.
	 *  - 210	: (HTTP Status Code = 200) Argument error. See statusMessage for more info.
	 *  - 400	: (HTTP Status Code = N/A) Malformed request string.
	 *  - 500	: (HTTP Status Code = 500) Internal error.
	 *
	 * @param int $statusCode the Pushwoosh status code.
	 */
	public function setStatusCode($statusCode) {

		$this -> statusCode = $statusCode;

	}

	/**
	 * Sets the Pushwoosh status message.
	 *
	 * @param string $statusMessage the pushwoosh status message.
	 */
	public function setStatusMessage($statusMessage) {

		$this -> statusMessage = $statusMessage;

	}

}
