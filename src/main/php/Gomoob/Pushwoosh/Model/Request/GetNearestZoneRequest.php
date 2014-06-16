<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Class which represents Pushwoosh '/getNearestZone' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodGetNearestZone
 */
class GetNearestZoneRequest {

	/**
	 * The Pushwoosh application ID where you send the message to.
	 *
	 * @var string
	 */
	private $application;

	/**
	 * The hardware device id used in registerDevice function call.
	 *
	 * @var string
	 */
	private $hwid;

	/**
	 * The latitude of the device.
	 *
	 * @var float
	 */
	private $lat;

	/**
	 * The longitude of the device.
	 *
	 * @var float
	 */
	private $lng;

	/**
	 * Gets the Pushwoosh application ID where you send the message to.
	 *
	 * @return string Pushwoosh application ID where you send the message to.
	 */
	public function getApplication() {

		return $this -> application;

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
	 * Gets the latitude of the device.
	 *
	 * @return float the latitude of the device.
	 */
	public function getLat() {

		return $this -> lat;

	}

	/**
	 * Gets the longitude of the device.
	 *
	 * @return float the longitude of the device.
	 */
	public function getLng() {

		return $this -> lng;

	}

	/**
	 * Sets the Pushwoosh application ID where you send the message to.
	 *
	 * @param string $application Pushwoosh application ID where you send the message to.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
	 */
	public function setApplication($application) {

		$this -> application = $application;

		return $this;

	}

	/**
	 * Sets the hardware device id used in registerDevice function call.
	 *
	 * @param string $hwid the the hardware device id used in registerDevice function call.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
	 */
	public function setHwid($hwid) {

		$this -> hwid = $hwid;

		return $this;

	}

	/**
	 * Sets the latitude of the device.
	 *
	 * @param float $lat the latitude of the device.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
	 */
	public function setLat($lat) {

		$this -> lat = $lat;

		return $this;

	}

	/**
	 * Sets the longitude of the device.
	 *
	 * @param float $lng the longitude of the device.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
	 */
	public function setLng($lng) {

		$this -> lng = $lng;

		return $this;

	}

}
