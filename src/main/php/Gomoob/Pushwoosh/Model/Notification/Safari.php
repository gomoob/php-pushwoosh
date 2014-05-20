<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Safari.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Safari {

	private $action;

	public function getAction() {

		return $this -> action;

	}

	public function setAction($action) {

		$this -> action = $action;

	}

	private $title;

	public function getTitle() {

		return $this -> title;

	}

	public function setTitle($title) {

		$this -> title = $title;

	}

	private $ttl;

	public function getTtl() {

		return $this -> ttl;

	}

	public function setTtl($ttl) {

		$this -> ttl = $ttl;

	}

	private $url;

	public function getUrl() {

		return $this -> url;

	}

	public function setUrl($url) {

		$this -> url = $url;

	}

}
