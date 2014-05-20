<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Class which represents Pushwoosh 'registerDevice' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-create
 */
class RegisterDeviceRequest {

	/**
	 * The Pushwoosh application ID for which one to register a new device.
	 *
	 * @var string
	 */
	private $application;

	/**
	 * The device type, this attribute can take the following values :
	 * 	- 1 : iPhone
	 *  - 2 : Blackberry
	 *  - 3 : Android
	 *  - 4 : Nokia
	 *  - 5 : Windows Phone 7
	 *  - 7 : Mac
	 *
	 * @var int
	 */
	private $deviceType;

	/**
	 * The Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not allowed,
	 * one of the alternative ways now is to use MAC address).
	 *
	 * @var string
	 */
	private $hwid;

	/**
	 * The language local of the device, this is a 2 letter local (for exempke "en").
	 *
	 * @var string
	 */
	private $language;

	/**
	 * The push token associated to the device.
	 *
	 * @var string
	 */
	private $pushToken;

	/**
	 * A timezone offset in seconds for the device (optional).
	 *
	 * @var string
	 */
	private $timezone;

	/**
	 * Gets the Pushwoosh application ID for which one to register a new device.
	 *
	 * @return string the Pushwoosh application ID for which one to register a new device.
	 */
	public function getApplication() {

		return $this -> application;

	}

	/**
	 * Gets the device type, this attribute can take the following values :
	 * 	- 1 : iPhone
	 *  - 2 : Blackberry
	 *  - 3 : Android
	 *  - 4 : Nokia
	 *  - 5 : Windows Phone 7
	 *  - 7 : Mac
	 *
	 * @return int the device type.
	 */
	public function getDeviceType() {

		return $this -> deviceType;

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
	 * Gets the language local of the device, this is a 2 letter local (for exempke "en").
	 *
	 * @return string the language local of the device, this is a 2 letter local (for exempke "en").
	 */
	public function getLanguage() {

		return $this -> language;

	}

	/**
	 * Gets the push token associated to the device.
	 *
	 * @return string the push token associated to the device.
	 */
	public function getPushToken() {

		return $this -> pushToken;

	}

	/**
	 * Gets the timezone offset in seconds for the device (optional).
	 *
	 * @return string the timezone offset in seconds for the device (optional).
	 */
	public function getTimezone() {

		return $this -> timezone;

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
	 * Sets the device type, this attribute can take the following values :
	 * 	- 1 : iPhone
	 *  - 2 : Blackberry
	 *  - 3 : Android
	 *  - 4 : Nokia
	 *  - 5 : Windows Phone 7
	 *  - 7 : Mac
	 *
	 * @param string $deviceType the device type to set.
	 */
	public function setDeviceType($deviceType) {

		$this -> deviceType = $deviceType;

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

	/**
	 * Sets the the language local of the device, this is a 2 letter local (for exempke "en").
	 *
	 * @param string $language the the language local of the device, this is a 2 letter local (for exempke "en").
	 */
	public function setLanguage($language) {

		$this -> language = $language;

	}

	/**
	 * Sets the push token associated to the device.
	 *
	 * @param string $pushToken the push token associated to the device.
	 */
	public function setPushToken($pushToken) {

		$this -> pushToken = $pushToken;

	}

	/**
	 * Sets the timezone offset in seconds for the device (optional).
	 *
	 * @param string $timezone the timezone offset in seconds for the device (optional).
	 */
	public function setTimezone($timezone) {

		$this -> timezone = $timezone;

	}

	/**
	 * Creates a JSON representation of this request.
	 *
	 * @return array a PHP which can be passed to the 'json_encode' PHP method.
	 */
	public function toJSON() {

		$json = array();

		return $json;

	}

}