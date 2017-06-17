<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use Gomoob\Pushwoosh\Model\Notification\MinimizeLink;

/**
 * Class which represents Pushwoosh '/createTargetedMessage' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CreateTargetedMessageRequest extends AbstractRequest
{
    /**
     * The campaign code to which you want to assign this push message.
     *
     * @var string
     */
    private $campain;

    /**
     * The text push message to send. This can be a plain string or an array which maps ISO 639-1 language codes to
     * associated messages. If the content is a plain string then the message is supposed to be written in English. If
     * the content is an array it has to have the following structure.
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
     * The devices filter used to identify the devices to which ones to send the notifications.
     *
     * @var string
     */
    private $devicesFilter;

    /**
     * Boolean used to indicate if the user timezone should be ignored.
     *
     * This parameter is optional
     *
     * @var bool
     */
    private $ignoreUserTimezone = true;

    // TODO: DOCUMENT ME!
    private $link;

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
     * The date when the message has to be sent, if a string is provided it must respect the following formats :
     *  - 'now'                : To indicate the message has to be sent when "now".
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
     * The timezone to use with the `sendDate` property, if ignored UTC-0 is default in `sendDate`.
     * See http://php.net/manual/timezones.php for the list of the supported timezones.
     *
     * @var string
     */
    private $timezone;

    /**
     * Utility function used to create a new `CreateTargetedMessageRequest` instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest the new created instance.
     */
    public static function create()
    {
        return new CreateTargetedMessageRequest();
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
     * Gets the text push message to send. This can be a plain string or an array which maps ISO 639-1 language codes to
     * associated messages. If the content is a plain string then the message is supposed to be written in English. If
     * the content is an array it has to have the following structure.
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
     * @return string|string[] the text push message to send.
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
     * Gets the devices filter used to identify the devices to which ones to send the notifications.
     *
     * @var string the devices filter used to identify the devices to which ones to send the notifications.
     */
    public function getDevicesFilter()
    {
        return $this->devicesFilter;
    }

    // TODO: DOCUMENT ME!
    public function getLink()
    {
        return $this->link;
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
     * {@inheritDoc}
     */
    public function isAuthSupported()
    {
        return true;
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
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        // The 'auth' parameter must have been set
        if (!isset($this->auth)) {
            throw new PushwooshException('The \'auth\' property is not set !');
        }

        $json = ['auth' => $this->auth];

        // Mandatory parameters
        $json['ignore_user_timezone'] = $this->ignoreUserTimezone;
        $json['send_date'] = is_string($this->sendDate) ? $this->sendDate : $this->sendDate->format('Y-m-d H:i');

        // Optional parameters
        isset($this->content) ? $json['content'] = $this->content : false;
        isset($this->data) ? $json['data'] = $this->data : false;
        isset($this->devicesFilter) ? $json['devices_filter'] = $this->devicesFilter : false;
        isset($this->filter) ? $json['filter'] = $this->filter : false;
        isset($this->link) ? $json['link'] = $this->link : false;
        isset($this->minimizeLink) ? $json['minimize_link'] = $this->minimizeLink->getValue() : false;
        isset($this->pageId) ? $json['page_id'] = $this->pageId : false;
        isset($this->remotePage) ? $json['remote_page'] = $this->remotePage : false;
        isset($this->richPageId) ? $json['rich_page_id'] = $this->richPageId : false;
        isset($this->sendRate)? $json['send_rate'] = $this->sendRate : false;
        isset($this->timezone)? $json['timezone'] = $this->timezone : false;

        return $json;
    }

    /**
     * Sets the campaign code to which you want to assign this push message.
     *
     * @param string $campain the campaign code to which you want to assign this push message.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setCampain($campain)
    {
        $this->campain = $campain;

        return $this;
    }

    /**
     * Sets the text push message to send. This can be a plain string or an array which maps ISO 639-1 language codes to
     * associated messages. If the content is a plain string then the message is supposed to be written in English. If
     * the content is an array it has to have the following structure.
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
     * @param string|string[] $content the text push message to sned.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
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
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Sets the devices filter used to identify the devices to which ones to send the notifications.
     *
     * @param string $devicesFilter the devices filter used to identify the devices to which ones to send the
     *        notifications.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setDevicesFilter($devicesFilter)
    {
        $this->devicesFilter = $devicesFilter;

        return $this;
    }

    /**
     * Sets if the user timezone should ne ignored.
     *
     * @param bool $ignoreUserTimezone `true` to ignore the user timezone, `false` otherwise.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setIgnoreUserTimezone($ignoreUserTimezone)
    {
        $this->ignoreUserTimezone = $ignoreUserTimezone;

        return $this;
    }

    // TODO: DOCUMENT ME!
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Sets the parameter used to indicate if the link must be minimized and how to minimize it.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the parameter used to indicate if the link must be
     *         minimized and how to minimize it.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
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
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Sets the Push Preset ID from your Control Panel.
     *
     * @param string $preset the Push Preset ID from your Control Panel.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
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
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
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
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setRichPageId($richPageId)
    {
        $this->richPageId = $richPageId;

        return $this;
    }

    /**
     * Sets the date when the message has to be sent, if a string is provided it must respect the following formats :
     *  - 'now'                : To indicate the message has to be sent when "now".
     *  - 'YYYY-MM-DD HH:mm    : Specify your own send date.
     *
     * @param \DateTime | string $sendDate the date when the message has to be sent.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
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
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
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
     * @return \Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest this instance.
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }
}
