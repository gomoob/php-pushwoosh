<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Android (Google Cloud Messaging).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see    https://developer.android.com/google/gcm/index.html
 */
class Android
{
    /**
     * Android application icon badge number.
     *
     * @var int
     */
    private $badges;
    
    private $banner;
    private $customIcon;

    /**
     * The Google Cloud Messaging Time To Live, this indicates how long (in seconds) the message should be kept on GCM
     * storage if the device is offline. Optional (default time-to-live is 4 weeks, and must be set as a JSON number).
     *
     * @var int
     */
    private $gcmTtl;
    private $header;
    
    /**
     * The icon background color on Lollipop, #RRGGBB, #AARRGGBB, "red", "black", "yellow", etc.
     *
     * @var string
     */
    private $ibc;
    
    private $icon;
    
    /**
     * The LED hex color, device will do its best approximation.
     *
     * @var string
     */
    private $led;
    
    /**
     * The priority of the push in the Android push drawer, valid values are -2, -1, 0, 1 and 2.
     *
     * @var int
     */
    private $priority;

    private $rootParams;
    private $sound;
    
    /**
     * A boolean used to force vibration for high-priority pushes.
     *
     * @var boolean
     */
    private $vibration;

    /**
     * Utility function used to create a new Android instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android the new created instance.
     */
    public static function create()
    {
        return new Android();

    }
    
    /**
     * Gets the Android application icon badge number.
     *
     * @return int The Android application icon badge number.
     */
    public function getBadges()
    {
        return $this->badges;
    }

    public function getBanner()
    {
        return $this->banner;

    }

    public function getCustomIcon()
    {
        return $this->customIcon;

    }

    /**
     * Gets the Google Cloud Messaging Time To Live, this indicates how long (in seconds) the message should be kept on
     * GCM storage if the device is offline. Optional (default time-to-live is 4 weeks, and must be set as a JSON
     * number).
     *
     * @return int the Google Cloud Messaging Time To Live.
     */
    public function getGcmTtl()
    {
        return $this->gcmTtl;

    }

    public function getHeader()
    {
        return $this->header;

    }
    
    /**
     * Gets the icon background color on Lollipop, #RRGGBB, #AARRGGBB, "red", "black", "yellow", etc.
     *
     * @return string The icon background color on Lollipop.
     */
    public function getIbc()
    {
        return $this->ibc;
    }

    public function getIcon()
    {
        return $this->icon;
    }
    
    /**
     * Gets the LED hex color, device will do its best approximation.
     *
     * @return string The LED hex color.
     */
    public function getLed()
    {
        return $this->led;
    }
    
    /**
     * Gets priority of the push in the Android push drawer, valid values are -2, -1, 0, 1 and 2.
     *
     * @return int The priority of the push in the Android push drawer.
     */
    public function getPriority()
    {
        return $this->priority;
    }

    public function getRootParams()
    {
        return $this->rootParams;
    }

    public function getSound()
    {
        return $this->sound;
    }
    
    /**
     * Gets the boolean used to force vibration for high-priority pushes.
     *
     * @return boolean The boolean used to force vibration for high-priority pushes.
     */
    public function isVibration()
    {
        return $this->vibration;
    }
    
    /**
     * Sets the Android application icon badge number.
     *
     * @param int $badges The Android application icon badge number.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android this instance.
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
        
        return $this;
    }

    public function setBanner($banner)
    {
        $this->banner = $banner;

        return $this;
    }

    public function setCustomIcon($customIcon)
    {
        $this->customIcon = $customIcon;

        return $this;
    }

    /**
     * Sets the Google Cloud Messaging Time To Live, this indicates how long (in seconds) the message should be kept on
     * GCM storage if the device is offline. Optional (default time-to-live is 4 weeks, and must be set as a JSON
     * number).
     *
     * @param int $gcmTtl the Google Cloud Messaging Time To Live.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android this instance.
     */
    public function setGcmTtl($gcmTtl)
    {
        $this->gcmTtl = $gcmTtl;

        return $this;
    }

    public function setHeader($header)
    {
        $this->header = $header;

        return $this;

    }
    
    /**
     * Sets the icon background color on Lollipop, #RRGGBB, #AARRGGBB, "red", "black", "yellow", etc.
     *
     * @param string $ibc The icon background color on Lollipop.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android this instance.
     */
    public function setIbc($ibc)
    {
        $this->ibc = $ibc;
         
        return $this;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }
    
    /**
     * Sets the LED hex color, device will do its best approximation.
     *
     * @param string $led The LED hex color to set.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android this instance.
     */
    public function setLed($led)
    {
        $this->led = $led;
        
        return $this;
    }
    
    /**
     * Sets the priority of the push in the Android push drawer, valid values are -2, -1, 0, 1 and 2.
     *
     * @param int $priority The priority of the push in the Android push drawer.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android this instance.
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
         
        return $this;
    }

    public function setRootParams($rootParams)
    {
        $this->rootParams = $rootParams;

        return $this;
    }

    public function setSound($sound)
    {
        $this->sound = $sound;

        return $this;
    }
    
    /**
     * Sets the boolean used to force vibration for high-priority pushes.
     *
     * @param boolean $vibration The boolean used to force vibration for high-priority pushes.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android this instance.
     */
    public function setVibration($vibration)
    {
        $this->vibration = $vibration;
        
        return $this;
    }

    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        $json = array();

        isset($this->badges) ? $json['android_badges'] = $this->badges : false;
        isset($this->banner) ? $json['android_banner'] = $this->banner : false;
        isset($this->customIcon) ? $json['android_custom_icon'] = $this->customIcon : false;
        isset($this->gcmTtl) ? $json['android_gcm_ttl'] = $this->gcmTtl : false;
        isset($this->header) ? $json['android_header'] = $this->header : false;
        isset($this->ibc) ? $json['android_ibc'] = $this->ibc : false;
        isset($this->icon) ? $json['android_icon'] = $this->icon : false;
        isset($this->led) ? $json['android_led'] = $this->led : false;
        isset($this->priority) ? $json['android_priority'] = $this->priority : false;
        isset($this->rootParams) ? $json['android_root_params'] = $this->rootParams : false;
        isset($this->sound) ? $json['android_sound'] = $this->sound : false;
        isset($this->vibration) ? $json['android_vibration'] = ($this->vibration ? 1 : 0) : false;

        return $json;

    }
}
