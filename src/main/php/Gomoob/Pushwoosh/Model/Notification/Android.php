<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Android (Google Cloud Messaging).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Android {

	/**
	 * Utility function used to create a new Android instance.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Android the new created instance.
	 */
	public static function create() {

		return new Android();

	}

	private $banner;

	public function getBanner() {

		return $this -> banner;

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

	private $gcmTtl;

	public function getGcmTtl() {

		return $this -> gcmTtl;

	}

	public function setGcmTtl($gcmTtl) {

		$this -> gcmTtl = $gcmTtl;

	}

	private $header;

	public function getHeader() {

		return $this -> header;

	}

	public function setHeader($header) {

		$this -> header = $header;

		return $this;

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

	/**
	 * Creates a JSON representation of this request.
	 *
	 * @return array a PHP array which can be passed to the 'json_encode' PHP method.
	 */
	public function toJSON() {

		$json = array();

		isset($this -> rootParams) ? $json['android_root_params'] = $this -> rootParams : false;
		isset($this -> sound) ? $json['android_sound'] = $this -> sound : false;
		isset($this -> header) ? $json['android_header'] = $this -> header : false;
		isset($this -> icon) ? $json['android_icon'] = $this -> icon : false;
		isset($this -> customIcon) ? $json['android_custom_icon'] = $this -> customIcon : false;
		isset($this -> banner) ? $json['android_banner'] = $this -> banner : false;
		isset($this -> gcmTtl) ? $json['android_gcm_ttl'] = $this -> gcmTtl : false;

		return $json;

	}

}
