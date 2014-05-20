<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Mac OS X.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Mac {

	private $badges;

	public function getBadges() {

		return $this -> badges;

	}

	public function setBadges($badges) {

		$this -> badges = $badges;

	}

	private $rootParams;

	public function getRootParams() {

		return $this -> rootParams;

	}

	public function setRootParams($rootParams) {

		$this -> rootParams = $rootParams;

	}

	private $sound;

	public function getSound() {

		return $this -> sound;

	}

	public function setSound($sound) {

		$this -> sound = $sound;

	}

	private $ttl;

	public function getTtl() {

		return $this -> ttl;

	}

	public function setTtl($ttl) {

		$this -> ttl = $ttl;

	}

}
