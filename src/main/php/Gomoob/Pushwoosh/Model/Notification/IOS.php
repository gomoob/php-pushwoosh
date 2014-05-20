<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for IOS (Apple Push Notification Service).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class IOS {

	private $aps;

	public function getAps() {

		return $this -> aps;

	}

	public function setAps($aps) {

		$this -> aps = $aps;

	}

	private $apnsTrimContent;

	public function getApnsTrimContent() {

		return $this -> apnsTrimContent;

	}

	public function setApnsTrimContent($apnsTrimContent) {

		$this -> apnsTrimContent = $apnsTrimContent;

	}

	private $badges;

	public function getBadges() {

		return $this -> badges;

	}

	public function setBadges($badges) {

		$this -> badges = $badges;

	}

	private $contentAvailable;

	public function getContentAvailable() {

		return $this-> contentAvailable;

	}

	public function setContentAvailable($contentAvailable) {

		$this -> contentAvailable = $contentAvailable;

	}

	private $sound;

	public function getSound() {

		return $this -> sound;

	}

	public function setSound($sound) {

		$this -> sound = $sound;

	}

	private $rootParams;

	public function getRootParams() {

		return $this -> rootParams;

	}

	public function setRootParams($rootParams) {

		$this -> rootParams = $rootParams;

	}

	private $ttl;

	public function getTtl() {

		return $this -> ttl;

	}

	public function setTtl($ttl) {

		$this -> ttl = $ttl;

	}

}