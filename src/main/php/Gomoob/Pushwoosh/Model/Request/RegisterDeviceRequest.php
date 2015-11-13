<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Class which represents Pushwoosh '/registerDevice' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class RegisterDeviceRequest
{
    /**
     * The Pushwoosh application ID for which one to register a new device.
     *
     * @var string
     */
    private $application;

    /**
     * The device type, this attribute can take the following values :
     *     - 1 : iPhone
     *  - 2 : Blackberry
     *  - 3 : Android
     *  - 4 : Nokia
     *  - 5 : Windows Phone 7
     *  - 7 : Mac
     *
     * @var int
     */
    private $deviceType;

    /**
     * The Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not allowed,
     * one of the alternative ways now is to use MAC address).
     *
     * @var string
     */
    private $hwid;

    /**
     * The language local of the device, this is a 2 letter local (for exempke "en").
     *
     * @var string
     */
    private $language;

    /**
     * The push token associated to the device.
     *
     * @var string
     */
    private $pushToken;

    /**
     * A timezone offset in seconds for the device (optional).
     *
     * @var int
     */
    private $timezone;

    /**
     * Utility function used to create a new instance of the <tt>RegisterDeviceRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest the new created instance.
     */
    public static function create()
    {
        return new RegisterDeviceRequest();

    }

    /**
     * Gets the Pushwoosh application ID for which one to register a new device.
     *
     * @return string the Pushwoosh application ID for which one to register a new device.
     */
    public function getApplication()
    {
        return $this->application;

    }

    /**
     * Gets the device type, this attribute can take the following values :
     *     - 1 : iPhone
     *  - 2 : Blackberry
     *  - 3 : Android
     *  - 4 : Nokia
     *  - 5 : Windows Phone 7
     *  - 7 : Mac
     *
     * @return int the device type.
     */
    public function getDeviceType()
    {
        return $this->deviceType;

    }

    /**
     * Gets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
     * allowed, one of the alternative ways now is to use MAC address).
     *
     * @return string the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and
     *         not allowed, one of the alternative ways now is to use MAC address).
     */
    public function getHwid()
    {
        return $this->hwid;

    }

    /**
     * Gets the language local of the device, this is a 2 letter local (for exempke "en").
     *
     * @return string the language local of the device, this is a 2 letter local (for exempke "en").
     */
    public function getLanguage()
    {
        return $this->language;

    }

    /**
     * Gets the push token associated to the device.
     *
     * @return string the push token associated to the device.
     */
    public function getPushToken()
    {
        return $this->pushToken;

    }

    /**
     * Gets the timezone offset in seconds for the device (optional).
     *
     * @return int the timezone offset in seconds for the device (optional).
     */
    public function getTimezone()
    {
        return $this->timezone;

    }

    /**
     * Sets the Pushwoosh application ID for which one to register a new device.
     *
     * @param string $application the the Pushwoosh application ID for which one to register a new device.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;

    }

    /**
     * Sets the device type, this attribute can take the following values :
     *     - 1 : iPhone
     *  - 2 : Blackberry
     *  - 3 : Android
     *  - 4 : Nokia
     *  - 5 : Windows Phone 7
     *  - 7 : Mac
     *
     * @param int $deviceType the device type to set.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest this instance.
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;

        return $this;

    }

    /**
     * Sets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
     * allowed, one of the alternative ways now is to use MAC address).
     *
     * @param string $hwid the Unique string to identify the device (Please note that accessing UDID on iOS is
     *        deprecated and not allowed, one of the alternative ways now is to use MAC address).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest this instance.
     */
    public function setHwid($hwid)
    {
        $this->hwid = $hwid;

        return $this;

    }

    /**
     * Sets the the language local of the device, this is a 2 letter local (for exempke "en").
     *
     * @param string $language the the language local of the device, this is a 2 letter local (for exempke "en").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest this instance.
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;

    }

    /**
     * Sets the push token associated to the device.
     *
     * @param string $pushToken the push token associated to the device.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest this instance.
     */
    public function setPushToken($pushToken)
    {
        $this->pushToken = $pushToken;

        return $this;

    }

    /**
     * Sets the timezone offset in seconds for the device (optional).
     *
     * @param int $timezone the timezone offset in seconds for the device (optional).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest this instance.
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;

    }

    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        // The 'application' parameter must have been defined.
        if (!isset($this->application)) {
            throw new PushwooshException('The \'application\' property is not set !');
        }

        // The 'deviceType' parameter must have been defined and must be valid.
        $this->checkDeviceType();

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');
        }

        // The 'pushToken' parameter must have been defined.
        if (!isset($this->pushToken)) {
            throw new PushwooshException('The \'pushToken\' property is not set !');
        }
        
        $json = array(
            'application' => $this->application,
            'push_token' => $this->pushToken,
            'language' => $this->language,
            'hwid' => $this->hwid,
            'timezone' => $this->timezone,
            'device_type' => $this->deviceType
        );

        return $json;

    }

    /**
     * Function used to check if the device type is configured and is valid.
     *
     * @throws \Gomoob\Pushwoosh\Exception\PushwooshException if the device type is not configured or is not valid.
     */
    private function checkDeviceType()
    {

        // The 'deviceType' parameter must have been defined.
        if (!isset($this->deviceType)) {
            throw new PushwooshException('The \'deviceType\' property is not set !');

        }

        // The 'deviceType' must be valid
        switch ($this->deviceType) {
            // 1 - iOS
            case 1:
                break;

            // 2 - BlackBerry
            case 2:
                break;

            // 3 - Android
            case 3:
                break;

            // 4 - Nokia ASHA
            case 4:
                break;

            // 5 - Windows Phone
            case 5:
                break;

            // 6 - Error (not documented in the Pushwoosh documentation)
            case 6:
                throw new PushwooshException('The \'deviceType\' value \'' . $this->deviceType . '\' is invalid !');
                break;

            // 7 - Mac OS X
            case 7:
                break;

            // 8 - Windows 8
            case 8:
                break;

            // 9 - Amazon
            case 9:
                break;

            // 10 - Safari
            case 10:
                break;

            // Invalid device type value
            default:
                throw new PushwooshException('The \'deviceType\' value \'' . $this->deviceType . '\' is invalid !');
                break;
        }

    }
}
