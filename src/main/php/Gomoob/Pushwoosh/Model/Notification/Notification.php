<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

use Gomoob\Pushwoosh\PushwooshException;
/**
 * Class which represents a Pushwoosh notification.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Notification {

	/**
	 * The object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\Android
	 */
	private $android;

	private $conditions;

	/**
	 * The text push message delivered to the application.
	 *
	 * @var string
	 */
	private $content;

	/**
	 * Use this only if you want to pass custom data to the application (JSON format) or omit this parameter. Please
	 * note that iOS push is limited to 256 bytes
	 *
	 * @var string
	 */
	private $data;

	private $devices;

	private $filter;

	/**
	 * The object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification Service).
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\IOS
	 */
	private $iOS;

	private $link;

	/**
	 * The date when the message has to be sent, if a string is provided it must respect the following formats :
	 * 	- 'now'				: To indicate the message has to be sent when "now".
	 *  - 'YYYY-MM-DD HH:mm	: Specify your own send date.
	 *
	 * The value of this property is "now" by default.
	 *
	 * @var \DateTime | string
	 */
	private $sendDate = 'now';

	private $ignoreUserTimezone;

	/**
	 * Optional parameter, can have the following values :
	 * 	- 0 or false : not minimized
	 *  - 1 		 : Google
	 *  - 2 		 : Bitly
	 *  - 3			 : Baidu (China)
	 *
	 *  Default is 1.
	 *
	 * @var int
	 */
	private $minimizeLink;

	private $pageId;

	private $plateforms;

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Android
	 */
	public function getAndroid() {

		return $this -> android;

	}

	/**
	 * Gets the text push message delivered to the application.
	 *
	 * @return string the test push message delivered to the application.
	 */
	public function getContent() {

		return $this -> content;

	}

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification
	 * Service).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\IOS the object which contains specific Pushwoosh notification
	 *         informations for IOS (Apple Push Notification Service).
	 */
	public function getIOS() {

		return $this -> iOS;

	}

	/**
	 * Gets the date when the message has to be sent, if a string is provided it must respect the following formats :
	 * 	- 'now'				: To indicate the message has to be sent when "now".
	 *  - 'YYYY-MM-DD HH:mm	: Specify your own send date.
	 *
	 * @return \DateTime | string the date when the message has to be sent, the returned value is a PHP DateTime or the
	 *         string "now".
	 */
	public function getSendDate() {

		return $this -> sendDate;

	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\Android $android the object which contains specific Pushwoosh
	 *        notification informations for Android (Google Cloud Messaging).
	 */
	public function setAndroid(Android $android) {

		$this -> android = $android;

	}

	/**
	 * Sets the text push message delivered to the application.
	 *
	 * @param string $content the text push message delivered to the application.
	 */
	public function setContent($content) {

		$this -> content = $content;

	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification
	 * Service).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\IOS $iOS the object which contains specific Pushwoosh notification
	 *        informations for IOS (Apple Push Notification Service).
	 */
	public function setIOS(IOS $iOS) {

		$this -> iOS = $ios;

	}

	/**
	 * Sets the date when the message has to be sent, if a string is provided it must respect the following formats :
	 * 	- 'now'				: To indicate the message has to be sent when "now".
	 *  - 'YYYY-MM-DD HH:mm	: Specify your own send date.
	 *
	 * @param \DateTime | string $sendDate the date when the message has to be sent.
	 */
	public function setSendDate(/* \DateTime */ $sendDate) {

		// Try to parse a string date
		if(is_string($dateTime) && $dateTime !== 'now') {

			$this -> sendDate = \DateTime::createFromFormat('Y-m-d H:i', $sendDate);

		}

		// If the date is equal to 'now' or a DateTime its ok
		else if($sendDate === 'now' || $sendDate instanceof \DateTime) {

			$this -> sendDate = $sendDate;

		}

		throw new PushwooshException('Invalid send date provided !');

	}

	/**
	 * Creates a JSON representation of this request.
	 *
	 * @return array a PHP which can be passed to the 'json_encode' PHP method.
	 */
	public function toJSON() {

		$json = array();

		// Mandatory parameters
		$json['send_date'] = is_string($this -> sendDate) ? $this -> sendDate : $this -> sendDate -> format('Y-m-d H:i');

		// Optional parameters
		isset($this -> content) ? $json['content'] = $this -> content : '';

		return $json;

	}

}
