<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Class which represents Pushwoosh 'pushStat' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodPushStat
 */
class PushStatRequest {

	/**
	 * The Pushwoosh application ID where you send the message to.
	 *
	 * @var string
	 */
	private $application;

	/**
	 * The tag received in push notification.
	 *
	 * @var string
	 */
	private $hash;

	/**
	 * The hardware device id used in registerDevice function call.
	 *
	 * @var string
	 */
	private $hwid;

	/**
	 * Gets the Pushwoosh application ID where you send the message to.
	 *
	 * @return string Pushwoosh application ID where you send the message to.
	 */
	public function getApplication() {

		return $this -> application;

	}

	/**
	 * Gets the tag received in push notification.
	 *
	 * @return string the tag received in push notification.
	 */
	public function getHash() {

		return $this -> hash;

	}

	/**
	 * Gets the hardware device id used in registerDevice function call.
	 *
	 * @return string the hardware device id used in registerDevice function call.
	 */
	public function getHwid() {

		return $this -> hwid;

	}

	/**
	 * Sets the Pushwoosh application ID where you send the message to.
	 *
	 * @param string $application Pushwoosh application ID where you send the message to.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest this instance.
	 */
	public function setApplication($application) {

		$this -> application = $application;

		return $this;

	}

	/**
	 * Sets the tag received in push notification.
	 *
	 * @param string $hash the tag received in push notification.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest this instance.
	 */
	public function setHash($hash) {

		$this -> hash = $hash;

		return $this;

	}

	/**
	 * Sets the hardware device id used in registerDevice function call.
	 *
	 * @param string $hwid the the hardware device id used in registerDevice function call.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest this instance.
	 */
	public function setHwid($hwid) {

		$this -> hwid = $hwid;

		return $this;

	}

}
