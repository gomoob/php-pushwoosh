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

	/**
	 * An array of tag conditions, an AND logical operator is applied between two tag conditions, for exemple to send
	 * push notifications to subscribers in Brazil that speaks Portuguese language you need to specify condition like
	 * this:
	 *
	 * "conditions": [["Country", "EQ", "BR"],["Language", "EQ", "pt"]]
	 *
	 * A Tag condition is an array like: [tagName, operator, operand], where
	 *  - tagName  : string
	 *  - operator : “LTE”|”GTE”|”EQ”|”BETWEEN”|”IN”
	 *  - operand  : string|integer|array
	 *
	 * Valid operators for String tags:
	 *  - EQ		: tag value equals to operand. Operand must be a string.
	 *
	 * Valid operators for Integer tags:
	 *  - GTE		: tag value greater then or equals to operand. Operand must be an integer;
	 *  - LTE		: tag value less then or equals to operand. Operand must be an integer;
	 *  - EQ		: tag value equals to operand. Operand must be an integer;
	 *  - BETWEEN	: tag value greater then or equals to min_operand value and tag value less then or equals to max
	 *                operand value. Operand must be an array like: [min_value, max_value].
	 *
	 * Valid operators for List tags:
	 *  - IN		: Intersect user values and operand. Operand must be an array of strings like:
	 *                ["value 1", "value 2", "value N"].
	 *
	 * You cannot use 'filter' and 'conditions' parameters together.
	 *
	 * @var array
	 */
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

	/**
	 * (Optional) If set, message will only be delivered to the devices in the list. Ignored if the applications group
	 * is used.
	 *
	 * @var string[]
	 */
	private $devices;

	/**
	 * The name of a filter used to select users to which one messages have to be sent.
	 *
	 * This parameter is optional.
	 *
	 * @var string
	 */
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
	 * Utility function used to create a new notification.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Notification the new created notification.
	 */
	public static function create() {

		return new Notification();

	}

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Android
	 */
	public function getAndroid() {

		return $this -> android;

	}

	/**
	 * Gets the array of tag conditions, an AND logical operator is applied between two tag conditions, for exemple to
	 * sendpush notifications to subscribers in Brazil that speaks Portuguese language you need to specify condition
	 * like this:
	 *
	 * "conditions": [["Country", "EQ", "BR"],["Language", "EQ", "pt"]]
	 *
	 * A Tag condition is an array like: [tagName, operator, operand], where
	 *  - tagName  : string
	 *  - operator : “LTE”|”GTE”|”EQ”|”BETWEEN”|”IN”
	 *  - operand  : string|integer|array
	 *
	 * Valid operators for String tags:
	 *  - EQ		: tag value equals to operand. Operand must be a string.
	 *
	 * Valid operators for Integer tags:
	 *  - GTE		: tag value greater then or equals to operand. Operand must be an integer;
	 *  - LTE		: tag value less then or equals to operand. Operand must be an integer;
	 *  - EQ		: tag value equals to operand. Operand must be an integer;
	 *  - BETWEEN	: tag value greater then or equals to min_operand value and tag value less then or equals to max
	 *                operand value. Operand must be an array like: [min_value, max_value].
	 *
	 * Valid operators for List tags:
	 *  - IN		: Intersect user values and operand. Operand must be an array of strings like:
	 *                ["value 1", "value 2", "value N"].
	 *
	 * You cannot use 'filter' and 'conditions' parameters together.
	 *
	 * @return array the array of tag conditions.
	 */
	public function getConditions() {

		return $this -> conditions;

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
	 * Gets the list of devices where to deliver the messages, this parameter is optional and is ignored if the
	 * applications group parameter is used.
	 *
	 * @return string[] the list of devices where to deliver the messages.
	 */
	public function getDevices() {

		return $this -> devices;

	}

	/**
	 * Gets the name of a filter used to select users to which one messages have to be sent.
	 *
	 * This parameter is optional.
	 *
	 * @return string the name of a filter.
	 */
	public function getFilter() {

		return $this -> filter;

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
	 * Sets the array of tag conditions, an AND logical operator is applied between two tag conditions, for exemple to
	 * sendpush notifications to subscribers in Brazil that speaks Portuguese language you need to specify condition
	 * like this:
	 *
	 * "conditions": [["Country", "EQ", "BR"],["Language", "EQ", "pt"]]
	 *
	 * A Tag condition is an array like: [tagName, operator, operand], where
	 *  - tagName  : string
	 *  - operator : “LTE”|”GTE”|”EQ”|”BETWEEN”|”IN”
	 *  - operand  : string|integer|array
	 *
	 * Valid operators for String tags:
	 *  - EQ		: tag value equals to operand. Operand must be a string.
	 *
	 * Valid operators for Integer tags:
	 *  - GTE		: tag value greater then or equals to operand. Operand must be an integer;
	 *  - LTE		: tag value less then or equals to operand. Operand must be an integer;
	 *  - EQ		: tag value equals to operand. Operand must be an integer;
	 *  - BETWEEN	: tag value greater then or equals to min_operand value and tag value less then or equals to max
	 *                operand value. Operand must be an array like: [min_value, max_value].
	 *
	 * Valid operators for List tags:
	 *  - IN		: Intersect user values and operand. Operand must be an array of strings like:
	 *                ["value 1", "value 2", "value N"].
	 *
	 * You cannot use 'filter' and 'conditions' parameters together.
	 *
	 * @param array $conditions the array of tag conditions.
	 */
	public function setConditions($conditions) {

		$this -> conditions = $conditions;

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
	 * Sets the list of devices where to deliver the messages, this parameter is optional and is ignored if the
	 * applications group parameter is used.
	 *
	 * @param string[] $devices the list of devices where to deliver the messages.
	 */
	public function setDevices(array $devices) {

		$this -> devices = $devices;

	}

	/**
	 * Sets the name of a filter used to select users to which one messages have to be sent.
	 *
	 * This parameter is optional.
	 *
	 * @param string $filter the name of a filter.
	 */
	public function setFilter($filter) {

		$this -> filter = $filter;

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
