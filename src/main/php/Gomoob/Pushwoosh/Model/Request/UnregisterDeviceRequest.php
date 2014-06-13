<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Class which represents Pushwoosh '/unregisterDevice' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodUnregister
 */
class UnregisterDeviceRequest {

	/**
	 * The Pushwoosh application ID for which one to register a new device.
	 *
	 * @var string
	 */
	private $application;

	/**
	 * The Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not allowed,
	 * one of the alternative ways now is to use MAC address).
	 *
	 * @var string
	 */
	private $hwid;

	/**
	 * Gets the Pushwoosh application ID for which one to register a new device.
	 *
	 * @return string the Pushwoosh application ID for which one to register a new device.
	 */
	public function getApplication() {

		return $this -> application;

	}

	/**
	 * Gets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
	 * allowed, one of the alternative ways now is to use MAC address).
	 *
	 * @return string the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and
	 *         not allowed, one of the alternative ways now is to use MAC address).
	 */
	public function getHwid() {

		return $this -> hwid;

	}

	/**
	 * Sets the Pushwoosh application ID for which one to register a new device.
	 *
	 * @param string $application the the Pushwoosh application ID for which one to register a new device.
	 */
	public function setApplication($application) {

		$this -> application = $application;

	}

	/**
	 * Sets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
	 * allowed, one of the alternative ways now is to use MAC address).
	 *
	 * @param string $hwid the Unique string to identify the device (Please note that accessing UDID on iOS is
	 *        deprecated and not allowed, one of the alternative ways now is to use MAC address).
	 */
	public function setHwid($hwid) {

		$this -> hwid = $hwid;

	}

}
