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
	 * An object which contains specific Pushwoosh notification informations for ADM (Amazon Device Messaging).
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\ADM
	 */
	private $aDM;

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
	 * note that iOS push is limited to 256 bytes.
	 * 
	 * This will be passed as a "u" parameter in the payload.
	 *
	 * @var array
	 */
	private $data;

	/**
	 * (Optional) The list of device tokens used to identify the devices to send the notification to. 
	 * 
	 * Not more than 1000 tokens in an array. If set, message will only be delivered to the devices in the list. Ignored 
	 * if the applications group is used.
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

	// TODO: DOCUMENT ME!
	private $link;

	/**
	 * The object which contains specific Pushwoosh notification informations for Mac OS X.
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\Mac
	 */
	private $mac;

	/**
	 * The object which contains specific Pushwoosh notification informations for Safari.
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\Safari
	 */
	private $safari;

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

	// TODO: DOCUMENT ME !
	private $ignoreUserTimezone = true;

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

	/**
	 * HTML page id (created from Application’s HTML Pages). Use this if you want to deliver additional HTML content to
	 * the application or omit this parameter.
	 *
	 * @var int
	 */
	private $pageId;

	// TODO: DOCUMENT ME !
	private $platforms;

	/**
	 * The object which contains specific Pushwoosh notification informations for WNS (Windows Notification Service).
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\WNS
	 */
	private $wNS;

	/**
	 * The object which contains specific Pushwoosh notification informations for WP (Windows Phone).
	 *
	 * @var \Gomoob\Pushwoosh\Model\Notification\WP
	 */
	private $wP;

	/**
	 * Utility function used to create a new notification.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Notification the new created notification.
	 */
	public static function create() {

		return new Notification();

	}
	
	/**
	 * Adds a new device Token to the list of device tokens to identify the devices to send the notification to.
	 *
	 * @param string $device the new device Token to add.
	 */
	public function addDevice($device) {
	
		if(!isset($this -> devices)) {
	
			$this -> devices = array();
	
		}
	
		$this -> devices[] = $device;
	
	}

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for ADM (Amazon Device Messaging).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\ADM the object which contains specific Pushwoosh notification
	 *         informations for ADM (Amazon Device Messaging).
	 */
	public function getADM() {

		return $this -> aDM;

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
	 * Gets additional data to attach to the notification, use this only if you want to pass custom data to the
	 * application (JSON format) or omit this parameter. Please note that iOS push is limited to 256 bytes.
	 *
	 * This will be passed as a "u" parameter in the payload.
	 *
	 * @return array an array which represents a JSON object.
	 */
	public function getData() {
	
		return $this -> data;
	
	}
	
	/**
	 * Gets the list of device tokens used to identify the devices to send the notification to, this parameter is
	 * optional.
	 *
	 * @return string[] the list of device tokens used to identify the devices to send the notification to, this
	 *         parameter is optional.
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
	
	// TODO: DOCUMENT ME !
	public function isIgnoreUserTimezone() {
	
		return $this -> ignoreUserTimezone;
	
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
	
	// TODO: DOCUMENT ME!
	public function getLink() {
	
		return $this -> link;
	
	}

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for Mac OS X.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Mac the object which contains specific Pushwoosh notification
	 *         informations for Mac OS X.
	 */
	public function getMac() {

		return $this -> mac;

	}

	/**
	 * Gets the HTML page id (created from Application’s HTML Pages). Use this if you want to deliver additional HTML
	 * content to the application or omit this parameter.
	 *
	 * @return int the HTML page id.
	 */
	public function getPageId() {

		return $this -> pageId;

	}
	
	// TODO: DOCUMENT ME !
	public function getPlatforms() {
	
		return $this -> platforms;
	
	}

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for Safari.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Safari the object which contains specific Pushwoosh notification
	 *         informations for Safari.
	 */
	public function getSafari() {

		return $this -> safari;

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
	 * Gets the object which contains specific Pushwoosh notification informations for WNS (Windows Notification
	 * Service).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\WNS the object which contains specific Pushwoosh notification
	 *         informations for WNS (Windows Notification Service).
	 */
	public function getWNS() {

		return $this -> wNS;

	}

	/**
	 * Gets the object which contains specific Pushwoosh notification informations for WP (Windows Phone).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\WP the object which contains specific Pushwoosh notification
	 *         informations for WP (Windows Phone).
	 */
	public function getWP() {

		return $this -> wP;

	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for ADM (Amazon Device Messaging).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\ADM $aDM the object which contains specific Pushwoosh notification
	 *        informations for ADM (Amazon Device Messaging).
	 */
	public function setADM(ADM $aDM) {

		$this -> aDM = $aDM;

	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\Android $android the object which contains specific Pushwoosh
	 *        notification informations for Android (Google Cloud Messaging).
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
	 */
	public function setAndroid(Android $android) {

		$this -> android = $android;

		return $this;

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
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
	 */
	public function setContent($content) {

		$this -> content = $content;

		return $this;

	}

	/**
	 * Sets the additional data to attache to the notification, use this only if you want to pass custom data to the
	 * application (JSON format) or omit this parameter. Please note that iOS push is limited to 256 bytes.
	 *
	 * This will be passed as a "u" parameter in the payload.
	 *
	 * @param array $data the additional data to be passed to the notification.
	 */
	public function setData(array $data) {
	
		$this -> data = $data;
	
	}
	
	/**
	 * Sets an additional data parameter or overwrites an existing one.
	 *
	 * @param string $parameterName the name of the additional data parameter to set.
	 * @param mixed $parameterValue the value of the additional data parameter to set. This parameter must be compliant
	 *        with JSON primitive types or must be an array.
	 */
	public function setDataParameter($parameterName, $parameterValue) {
	
		if(!isset($this -> data)) {
	
			$this -> data = array();
	
		}
	
		$this -> data[$parameterName] = $parameterValue;
	
	}
	
	/**
	 * Sets the list of device tokens used to identify the devices to send the notification to, this parameter is
	 * optional.
	 *
	 * @param string[] $devices the list of device tokens used to identify the devices to send the notification to, this
	 *        parameter is optional.
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
	
	// TODO: DOCUMENT ME !
	public function setIgnoreUserTimezone($ignoreUserTimezone) {
	
		$this -> ignoreUserTimezone = $ignoreUserTimezone;
	
	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification
	 * Service).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\IOS $iOS the object which contains specific Pushwoosh notification
	 *        informations for IOS (Apple Push Notification Service).
	 */
	public function setIOS(IOS $iOS) {

		$this -> iOS = $iOS;
		
		return $this;

	}
	
	// TODO: DOCUMENT ME!
	public function setLink($link) {
	
		$this -> link = $link;
	
	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for Mac OS X.
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\Mac $mac the object which contains specific Pushwoosh notification
	 *        informations for Mac OS X.
	 */
	public function setMac(Mac $mac) {

		$this -> mac = $mac;

	}

	/**
	 * Sets the HTML page id (created from Application’s HTML Pages). Use this if you want to deliver additional HTML
	 * content to the application or omit this parameter.
	 *
	 * @param int $pageId the HTML page id to set1.
	 */
	public function setPageId($pageId) {

		$this -> pageId = $pageId;

	}
	
	// TODO: DOCUMENT ME !
	public function setPlatforms(array $platforms) {
	
		$this -> platforms = $platforms;
	
	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for Safari.
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\Safari $safari the object which contains specific Pushwoosh
	 *        notification informations for Safari.
	 */
	public function setSafari(Safari $safari) {

		$this -> safari = $safari;

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
	 * Sets the object which contains specific Pushwoosh notification informations for WNS (Windows Notification
	 * Service).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\WNS $wNS the object which contains specific Pushwoosh notification
	 *        informations for WNS (Windows Notification Service).
	 */
	public function setWNS($wNS) {

		$this -> wNS = $wNS;

	}

	/**
	 * Sets the object which contains specific Pushwoosh notification informations for WP (Windows Phone).
	 *
	 * @param \Gomoob\Pushwoosh\Model\Notification\WP $wP the object which contains specific Pushwoosh notification
	 *        informations for WP (Windows Phone).
	 */
	public function setWP(WP $wP) {

		$this -> wP = $wP;

	}

	/**
	 * Creates a JSON representation of this request.
	 *
	 * @return array a PHP which can be passed to the 'json_encode' PHP method.
	 */
	public function toJSON() {

		$json = array();

		// Mandatory parameters
		$json['ignore_user_timezone'] = $this -> ignoreUserTimezone;
		$json['send_date'] = is_string($this -> sendDate) ? $this -> sendDate : $this -> sendDate -> format('Y-m-d H:i');

		// Optional parameters
		isset($this -> content) ? $json['content'] = $this -> content : false;
		isset($this -> data) ? $json['data'] = $this -> data : false;
		isset($this -> devices) ? $json['devices'] = $this -> devices : false;

		// Android Specific informations
		if(isset($this -> android)) {

			foreach($this -> android -> toJSON() as $key => $value) {

				$json[$key] = $value;

			}

		}
		
		// iOS Specific informations
		if(isset($this -> iOS)) {
			
			foreach($this -> iOS -> toJSON() as $key => $value) {

				$json[$key] = $value;

			}
			
		}

		return $json;

	}

}
