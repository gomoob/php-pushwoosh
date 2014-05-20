<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Amazon Device Messaging.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class ADM {

	private $banner;

	public function getBanner() {

		return $this -> banne;

	}

	public function setBanner($banner) {

		$this -> banner = $banner;

	}

	private $customIcon;

	public function getCustomIcon() {

		return $this -> customIcon;

	}

	public function setCustomIcon($customIcon) {

		$this -> customIcon = $customIcon;

	}

	private $header;

	public function getHeader() {

		return $this -> header;

	}

	public function setHeader($header) {

		$this -> header = $header;

	}

	private $icon;

	public function getIcon() {

		return $this -> icon;

	}

	public function setIcon($icon) {

		$this -> icon = $icon;

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
