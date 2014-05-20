<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Windows Phone.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class WP {

	private $backbackground;

	public function getBackbackground() {

		return $this -> backbackground;

	}

	public function setBackbackground($backbackground) {

		$this -> backbackground = $backbackground;

	}

	private $background;

	public function getBackground() {

		return $this -> background;

	}

	public function setBackground($background) {

		$this -> background = $background;

	}

	private $backtitle;

	public function getBacktitle() {

		return $this -> backtitle;

	}

	public function setBacktitle($backtitle) {

		$this -> backtitle = $backtitle;

	}

	private $count;

	public function getCount() {

		return $this -> count;

	}

	public function setCount($count) {

		$this -> count = $count;

	}

	private $type;

	public function getType() {

		return $this -> type;

	}

	public function setType($type) {

		$this -> type = $type;

	}

}
