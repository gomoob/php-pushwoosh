<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

use Gomoob\Pushwoosh\JsonUtils;
use Gomoob\Pushwoosh\Exception\PushwooshException;
use Gomoob\Pushwoosh\Model\Condition\ICondition;

/**
 * Class which represents a Pushwoosh notification.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Notification implements \JsonSerializable
{
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
     * The object which contains specific Pushwoosh notification informations for BlackBerry.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\BlackBerry
     */
    private $blackBerry;
    
    /**
     * The campaign code to which you want to assign this push message.
     *
     * @var string
     */
    private $campain;

    /**
     * The object which contains specific Pushwoosh notification informations for Chrome.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\Chrome
     */
    private $chrome;

    /**
     * The object which contains specific Pushwoosh notification informations for Firefox.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\Firefox
     */
    private $firefox;

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
     *  - EQ        : tag value equals to operand. Operand must be a string.
     *
     * Valid operators for Integer tags:
     *  - GTE        : tag value greater then or equals to operand. Operand must be an integer;
     *  - LTE        : tag value less then or equals to operand. Operand must be an integer;
     *  - EQ        : tag value equals to operand. Operand must be an integer;
     *  - BETWEEN    : tag value greater then or equals to min_operand value and tag value less then or equals to max
     *                operand value. Operand must be an array like: [min_value, max_value].
     *
     * Valid operators for List tags:
     *  - IN        : Intersect user values and operand. Operand must be an array of strings like:
     *                ["value 1", "value 2", "value N"].
     *
     * You cannot use 'filter' and 'conditions' parameters together.
     *
     * @var \Gomoob\Pushwoosh\Model\Condition\ICondition[]
     */
    private $conditions;

    /**
     * The text push message delivered to the application. This can be a plain string or an array which maps ISO 639-1
     * language codes to associated messages. If the content is a plain string then the message is supposed to be
     * written in English. If the content is an array it has to have the following structure.
     *
     * ```
     * [
     *     'en' => 'Hello !',
     *     'fr' => 'Bonjour !',
     *     'es' => 'Buenos dias !'
     * ]
     * ```
     *
     * For Windows 8 this parameter is ignored, use `wns_content` instead.
     *
     * @var string|string[]
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
     * Boolean used to indicate if the user timezone should be ignored.
     *
     * This parameter is optional
     *
     * @var bool
     */
    private $ignoreUserTimezone = true;

    /**
     * The object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification Service).
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\IOS
     */
    private $iOS;

    /**
     * Parameter Link
     * @var string
     */
    private $link;

    /**
     * The object which contains specific Pushwoosh notification informations for Mac OS X.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\Mac
     */
    private $mac;

    /**
     * Parameter used to indicate if the link must be minimized and how to minimize it.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\MinimizeLink
     */
    private $minimizeLink;

    /**
     * HTML page id (created from Application's HTML Pages). Use this if you want to deliver additional HTML content to
     * the application or omit this parameter.
     *
     * @var int
     */
    private $pageId;

    /**
     * Sets the platforms to which ones to send messages.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\Platform[]
     */
    private $platforms;
    
    /**
     * Sets the Push Preset ID from your Control Panel.
     *
     * @var string
     */
    private $preset;

    /**
     * The remote Rich HTML Page URL. <scheme>://<authority>.
     *
     * @var string
     */
    private $remotePage;
    
    /**
     * The new Rich HTML page identifier.
     *
     * @var int
     */
    private $richPageId;

    /**
     * The object which contains specific Pushwoosh notification informations for Safari.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\Safari
     */
    private $safari;

    /**
     * The date when the message has to be sent, if a string is provided it must respect the following formats :
     *     - 'now'                : To indicate the message has to be sent when "now".
     *  - 'YYYY-MM-DD HH:mm    : Specify your own send date.
     *
     * The value of this property is "now" by default.
     *
     * @var \DateTime | string
     */
    private $sendDate = 'now';
    
    /**
     * The throttling, valid values are from 100 to 1000 pushes/second.
     *
     * @var int
     */
    private $sendRate;
    
    /**
     * The timezone to use with the `sendDate` property, if ignored UTC-0 is default in "send_date".
     * See http://php.net/manual/timezones.php for the list of the supported timezones.
     *
     * @var string
     */
    private $timezone;

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
    public static function create()
    {
        return new Notification();
    }

    /**
     * Add a new conditions to the conditions associated to this notification.
     *
     * @param \Gomoob\Pushwoosh\Model\Condition\ICondition $condition the new condition to add.
     */
    public function addCondition(ICondition $condition)
    {
        if (!isset($this->conditions)) {
            $this->conditions = [];
        }

        $this->conditions[] = $condition;
    }

    /**
     * Adds a new device Token to the list of device tokens to identify the devices to send the notification to.
     *
     * @param string $device the new device Token to add.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function addDevice($device)
    {
        if (!isset($this->devices)) {
            $this->devices = [];
        }

        $this->devices[] = $device;

        return $this;
    }

    /**
     * Add a new platform to the list of platforms where to send push notification.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Platform $platform the new platform to add.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function addPlatform(Platform $platform)
    {
        if (!isset($this->platforms)) {
            $this->platforms = [];
        }

        $this->platforms[] = $platform;

        return $this;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for ADM (Amazon Device Messaging).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\ADM the object which contains specific Pushwoosh notification
     *         informations for ADM (Amazon Device Messaging).
     */
    public function getADM()
    {
        return $this->aDM;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android
     */
    public function getAndroid()
    {
        return $this->android;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for BlackBerry.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\BlackBerry
     */
    public function getBlackBerry()
    {
        return $this->blackBerry;
    }
    
    /**
     * Gets the campaign code to which you want to assign this push message.
     *
     * @return string the campaign code to which you want to assign this push message.
     */
    public function getCampain()
    {
        return $this->campain;
    }
    
    /**
     * Gets the object which contains specific Pushwoosh notification informations for Chrome.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome
     */
    public function getChrome()
    {
        return $this->chrome;
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
     *  - EQ        : tag value equals to operand. Operand must be a string.
     *
     * Valid operators for Integer tags:
     *  - GTE        : tag value greater then or equals to operand. Operand must be an integer;
     *  - LTE        : tag value less then or equals to operand. Operand must be an integer;
     *  - EQ        : tag value equals to operand. Operand must be an integer;
     *  - BETWEEN    : tag value greater then or equals to min_operand value and tag value less then or equals to max
     *                operand value. Operand must be an array like: [min_value, max_value].
     *
     * Valid operators for List tags:
     *  - IN        : Intersect user values and operand. Operand must be an array of strings like:
     *                ["value 1", "value 2", "value N"].
     *
     * You cannot use 'filter' and 'conditions' parameters together.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\ICondition the array of tag conditions.
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Gets the text push message delivered to the application. This can be a plain string or an array which maps ISO
     * 639-1 language codes to associated messages. If the content is a plain string then the message is supposed to be
     * written in English. If the content is an array it has to have the following structure.
     *
     * ```
     * [
     *     'en' => 'Hello !',
     *     'fr' => 'Bonjour !',
     *     'es' => 'Buenos dias !'
     * ]
     * ```
     *
     * For Windows 8 this parameter is ignored, use `wns_content` instead.
     *
     * @return string|string[] the text push message delivered to the application.
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Gets additional data to attach to the notification, use this only if you want to pass custom data to the
     * application (JSON format) or omit this parameter. Please note that iOS push is limited to 256 bytes.
     *
     * This will be passed as a "u" parameter in the payload.
     *
     * @return array an array which represents a JSON object.
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Gets the list of device tokens used to identify the devices to send the notification to, this parameter is
     * optional.
     *
     * @return string[] the list of device tokens used to identify the devices to send the notification to, this
     *         parameter is optional.
     */
    public function getDevices()
    {
        return $this->devices;
    }

    /**
     * Gets the name of a filter used to select users to which one messages have to be sent.
     *
     * This parameter is optional.
     *
     * @return string the name of a filter.
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for Firefox.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Firefox
     */
    public function getFirefox()
    {
        return $this->firefox;
    }

    /**
     * Indicates if the user timezone should be ignored.
     *
     * @return boolean `true` if the user timezone should be ignored, `false` otherwise.
     */
    public function isIgnoreUserTimezone()
    {
        return $this->ignoreUserTimezone;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification
     * Service).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\IOS the object which contains specific Pushwoosh notification
     *         informations for IOS (Apple Push Notification Service).
     */
    public function getIOS()
    {
        return $this->iOS;
    }

    /**
     * Get Link Param
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for Mac OS X.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Mac the object which contains specific Pushwoosh notification
     *         informations for Mac OS X.
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * Gets the parameter used to indicate if the link must be minimized and how to minimize it.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the parameter used to indicate if the link must be
     *                                                           minimized and how to minimize it.
     */
    public function getMinimizeLink()
    {
        return $this->minimizeLink;
    }

    /**
     * Gets the HTML page id (created from Application’s HTML Pages). Use this if you want to deliver additional HTML
     * content to the application or omit this parameter.
     *
     * @return int the HTML page id.
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Gets the platforms to which ones to send messages.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform[] the platforms where to send push notifications.
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }
    
    /**
     * Gets the Push Preset ID from your Control Panel.
     *
     * @return string the Push Preset ID from your Control Panel.
     */
    public function getPreset()
    {
        return $this->preset;
    }
    
    /**
     * Gets the remote Rich HTML Page URL. <scheme>://<authority>.
     *
     * @return string the remote Rich HTML Page URL. <scheme>://<authority>.
     */
    public function getRemotePage()
    {
        return $this->remotePage;
    }
    
    /**
     * Gets the new Rich HTML page identifier.
     *
     * @return int the new Rich HTML page identifier.
     */
    public function getRichPageId()
    {
        return $this->richPageId;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for Safari.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Safari the object which contains specific Pushwoosh notification
     *         informations for Safari.
     */
    public function getSafari()
    {
        return $this->safari;
    }

    /**
     * Gets the date when the message has to be sent, if a string is provided it must respect the following formats :
     *  - 'now'                : To indicate the message has to be sent when "now".
     *  - 'YYYY-MM-DD HH:mm    : Specify your own send date.
     *
     * @return \DateTime | string the date when the message has to be sent, the returned value is a PHP DateTime or the
     *         string "now".
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }
    
    /**
     * Gets the throttling, valid values are from 100 to 1000 pushes/second.
     *
     * @return int The throttling in pushes/second.
     */
    public function getSendRate()
    {
        return $this->sendRate;
    }
    
    /**
     * Gets the timezone to use with the `sendDate` property, if ignored UTC-0 is default in `sendDate`. See
     * http://php.net/manual/timezones.php for the list of the supported timezones.
     *
     * @return string the timezone to use with the `sendDate` property, if ignored UTC-0 is default in `sendDate`. See
     *         http://php.net/manual/timezones.php for the list of the supported timezones.
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for WNS (Windows Notification
     * Service).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\WNS the object which contains specific Pushwoosh notification
     *         informations for WNS (Windows Notification Service).
     */
    public function getWNS()
    {
        return $this->wNS;
    }

    /**
     * Gets the object which contains specific Pushwoosh notification informations for WP (Windows Phone).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\WP the object which contains specific Pushwoosh notification
     *         informations for WP (Windows Phone).
     */
    public function getWP()
    {
        return $this->wP;
    }
    
    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP which can be passed to the 'json_encode' PHP method.
     */
    public function jsonSerialize()
    {
        $json = [];
    
        // Mandatory parameters
        $json['ignore_user_timezone'] = $this->ignoreUserTimezone;
        $json['send_date'] = is_string($this->sendDate) ? $this->sendDate : $this->sendDate->format('Y-m-d H:i');
    
        // Optional parameters
        isset($this->campain) ? $json['campaign'] = $this->campain : false;
        isset($this->content) ? $json['content'] = $this->content : false;
        isset($this->data) ? $json['data'] = $this->data : false;
        isset($this->devices) ? $json['devices'] = $this->devices : false;
        isset($this->filter) ? $json['filter'] = $this->filter : false;
        isset($this->link) ? $json['link'] = $this->link : false;
        isset($this->minimizeLink) ? $json['minimize_link'] = $this->minimizeLink->getValue() : false;
        isset($this->pageId) ? $json['page_id'] = $this->pageId : false;
        isset($this->remotePage) ? $json['remote_page'] = $this->remotePage : false;
        isset($this->richPageId) ? $json['rich_page_id'] = $this->richPageId : false;
        isset($this->sendRate)? $json['send_rate'] = $this->sendRate : false;
        isset($this->timezone)? $json['timezone'] = $this->timezone : false;

        if (isset($this->conditions)) {
            $conditionsArray = [];
    
            foreach ($this->conditions as $condition) {
                $conditionsArray[] = $condition->jsonSerialize();
            }
    
            $json['conditions'] = $conditionsArray;
        }
    
        if (isset($this->platforms)) {
            $platformsArray = [];
    
            foreach ($this->platforms as $platform) {
                $platformsArray[] = $platform->getValue();
            }
    
            $json['platforms'] = $platformsArray;
        }
    
        // Merge specific platforms informations
        return JsonUtils::mergeJsonSerializables(
            $json,
            $this->aDM,
            $this->android,
            $this->blackBerry,
            $this->chrome,
            $this->firefox,
            $this->iOS,
            $this->mac,
            $this->safari,
            $this->wNS,
            $this->wP
        );
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for ADM (Amazon Device Messaging).
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\ADM $aDM the object which contains specific Pushwoosh notification
     *        informations for ADM (Amazon Device Messaging).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setADM(ADM $aDM)
    {
        $this->aDM = $aDM;

        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for Android (Google Cloud Messaging).
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Android $android the object which contains specific Pushwoosh
     *        notification informations for Android (Google Cloud Messaging).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setAndroid(Android $android)
    {
        $this->android = $android;

        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for BlackBerry.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\BlackBerry $blackBerry the object which contains specific Pushwoosh
     *                                                                    notification informations for BlackBerry.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setBlackBerry(BlackBerry $blackBerry)
    {
        $this->blackBerry = $blackBerry;

        return $this;
    }
    
    /**
     * Sets the campaign code to which you want to assign this push message.
     *
     * @param string $campain the campaign code to which you want to assign this push message.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setCampain($campain)
    {
        $this->campain = $campain;
         
        return $this;
    }
    
    /**
     * Sets the object which contains specific Pushwoosh notification informations for Chrome.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Chrome $chrome the object which contains specific Pushwoosh
     *                                                            notification informations for Chrome.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setChrome(Chrome $chrome)
    {
        $this->chrome = $chrome;
    
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
     *  - EQ        : tag value equals to operand. Operand must be a string.
     *
     * Valid operators for Integer tags:
     *  - GTE        : tag value greater then or equals to operand. Operand must be an integer;
     *  - LTE        : tag value less then or equals to operand. Operand must be an integer;
     *  - EQ        : tag value equals to operand. Operand must be an integer;
     *  - BETWEEN    : tag value greater then or equals to min_operand value and tag value less then or equals to max
     *                operand value. Operand must be an array like: [min_value, max_value].
     *
     * Valid operators for List tags:
     *  - IN        : Intersect user values and operand. Operand must be an array of strings like:
     *                ["value 1", "value 2", "value N"].
     *
     * You cannot use 'filter' and 'conditions' parameters together.
     *
     * @param \Gomoob\Pushwoosh\Model\Condition\ICondition $conditions the array of tag conditions.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setConditions($conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * Sets the text push message delivered to the application. This can be a plain string or an array which maps ISO
     * 639-1 language codes to associated messages. If the content is a plain string then the message is supposed to be
     * written in English. If the content is an array it has to have the following structure.
     *
     * ```
     * [
     *     'en' => 'Hello !',
     *     'fr' => 'Bonjour !',
     *     'es' => 'Buenos dias !'
     * ]
     * ```
     *
     * For Windows 8 this parameter is ignored, use `wns_content` instead.
     *
     * @param string|string[] $content the text push message delivered to the application.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Sets the additional data to attach to the notification, use this only if you want to pass custom data to the
     * application (JSON format) or omit this parameter. Please note that iOS push is limited to 256 bytes.
     *
     * This will be passed as a "u" parameter in the payload.
     *
     * @param array $data the additional data to be passed to the notification.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Sets the list of device tokens used to identify the devices to send the notification to, this parameter is
     * optional.
     *
     * @param string[] $devices the list of device tokens used to identify the devices to send the notification to, this
     *        parameter is optional.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setDevices(array $devices)
    {
        $this->devices = $devices;

        return $this;
    }

    /**
     * Sets the name of a filter used to select users to which one messages have to be sent.
     *
     * This parameter is optional.
     *
     * @param string $filter the name of a filter.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for Firfox.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Firefox $firefox the object which contains specific Pushwoosh
     *                                                            notification informations for Firefox.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setFirefox($firefox)
    {
        $this->firefox = $firefox;

        return $this;
    }

    /**
     * Sets if the user timezone should ne ignored.
     *
     * @param bool $ignoreUserTimezone `true` to ignore the user timezone, `false` otherwise.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setIgnoreUserTimezone($ignoreUserTimezone)
    {
        $this->ignoreUserTimezone = $ignoreUserTimezone;

        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for IOS (Apple Push Notification
     * Service).
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\IOS $iOS the object which contains specific Pushwoosh notification
     *        informations for IOS (Apple Push Notification Service).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setIOS(IOS $iOS)
    {
        $this->iOS = $iOS;

        return $this;
    }

    // TODO: DOCUMENT ME!
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for Mac OS X.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Mac $mac the object which contains specific Pushwoosh notification
     *        informations for Mac OS X.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setMac(Mac $mac)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * Sets the parameter used to indicate if the link must be minimized and how to minimize it.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the parameter used to indicate if the link must be
     *         minimized and how to minimize it.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setMinimizeLink(MinimizeLink $minimizeLink)
    {
        $this->minimizeLink = $minimizeLink;

        return $this;
    }

    /**
     * Sets the HTML page id (created from Application’s HTML Pages). Use this if you want to deliver additional HTML
     * content to the application or omit this parameter.
     *
     * @param int $pageId the HTML page id to set1.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Sets the platforms to which ones to send messages.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Platform[] $platforms the platforms where to send the push
     *                                                                   notifications.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setPlatforms(array $platforms)
    {
        $this->platforms = $platforms;

        return $this;
    }
    
    /**
     * Sets the Push Preset ID from your Control Panel.
     *
     * @param string $preset the Push Preset ID from your Control Panel.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setPreset($preset)
    {
        $this->preset = $preset;
         
        return $this;
    }
    
    /**
     * Sets the remote Rich HTML Page URL. <scheme>://<authority>.
     *
     * @param string $remotePage the remote Rich HTML Page URL. <scheme>://<authority>.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setRemotePage($remotePage)
    {
        $this->remotePage = $remotePage;
        
        return $this;
    }
    
    /**
     * Sets the new Rich HTML page identifier.
     *
     * @param int $richPageId the new Rich HTML page identifier.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setRichPageId($richPageId)
    {
        $this->richPageId = $richPageId;
         
        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for Safari.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Safari $safari the object which contains specific Pushwoosh
     *        notification informations for Safari.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setSafari(Safari $safari)
    {
        $this->safari = $safari;

        return $this;
    }

    /**
     * Sets the date when the message has to be sent, if a string is provided it must respect the following formats :
     *  - 'now'                : To indicate the message has to be sent when "now".
     *  - 'YYYY-MM-DD HH:mm    : Specify your own send date.
     *
     * @param \DateTime | string $sendDate the date when the message has to be sent.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setSendDate(/* \DateTime */ $sendDate)
    {
        // Try to parse a string date
        if (is_string($sendDate) && $sendDate !== 'now') {
            $newSendDate = \DateTime::createFromFormat('Y-m-d H:i', $sendDate);

            // The provided send date string is invalid
            if ($newSendDate === false) {
                throw new PushwooshException('Invalid send date provided !');
            }

            $this->sendDate = $newSendDate;

            // If the date is equal to 'now' or a DateTime its ok
        } elseif ($sendDate === 'now' || $sendDate instanceof \DateTime) {
            $this->sendDate = $sendDate;

            // Invalid send date provided
        } else {
            throw new PushwooshException('Invalid send date provided !');
        }

        return $this;
    }
    
    /**
     * Sets the throttling, valid values are from 100 to 1000 pushes/second.
     *
     * @param int $sendRate The throttling in pushes/second.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setSendRate($sendRate)
    {
        $this->sendRate = $sendRate;
    
        return $this;
    }

    /**
     * Sets the timezone to use with the `sendDate` property, if ignored UTC-0 is default in `sendDate`. See
     * http://php.net/manual/timezones.php for the list of the supported timezones.
     *
     * @param string $timezone the timezone to use with the `sendDate` property.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        
        return $this;
    }
    
    /**
     * Sets the object which contains specific Pushwoosh notification informations for WNS (Windows Notification
     * Service).
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\WNS $wNS the object which contains specific Pushwoosh notification
     *        informations for WNS (Windows Notification Service).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setWNS($wNS)
    {
        $this->wNS = $wNS;

        return $this;
    }

    /**
     * Sets the object which contains specific Pushwoosh notification informations for WP (Windows Phone).
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\WP $wP the object which contains specific Pushwoosh notification
     *        informations for WP (Windows Phone).
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification this instance.
     */
    public function setWP(WP $wP)
    {
        $this->wP = $wP;

        return $this;
    }
}
