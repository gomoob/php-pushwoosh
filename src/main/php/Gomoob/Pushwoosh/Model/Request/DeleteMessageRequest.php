<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Class which represents Pushwoosh '/deleteMessage' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-delete
 */
class DeleteMessageRequest {

	/**
	 * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
	 *
	 * @var string
	 */
	private $auth;

	/**
	 * The message code obtained in createMessage.
	 *
	 * @var string
	 */
	private $message;

	/**
	 * Gets the API access token from the Pushwoosh control panel (create this token at
	 * https://cp.pushwoosh.com/api_access).
	 *
	 * @return string the API access token from the Pushwoosh control panel (create this token at
	 *         https://cp.pushwoosh.com/api_access).
	 */
	public function getAuth() {

		return $this -> auth;

	}

	/**
	 * Gets the message code obtained in createMessage.
	 *
	 * @return string the message code obtained in createMessage.
	 */
	public function getMessage() {

		return $this -> message;

	}

	/**
	 * Sets the API access token from the Pushwoosh control panel (create this token at
	 * https://cp.pushwoosh.com/api_access).
	 *
	 * @param string $auth the API access token from the Pushwoosh control panel (create this token at
	 *        https://cp.pushwoosh.com/api_access).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest this instance.
	 */
	public function setAuth($auth) {

		$this -> auth = $auth;

		return $this;

	}

	/**
	 * Sets the message code obtained in createMessage.
	 *
	 * @param string $message the message code obtained in createdMessage.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest this instance.
	 */
	public function setMessage($message) {

		$this -> message = $messsage;

		return $this;

	}

}
