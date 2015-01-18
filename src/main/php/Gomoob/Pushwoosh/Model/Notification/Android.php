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
    private $icon;
    private $rootParams;
    private $sound;

    /**
     * Utility function used to create a new Android instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Android the new created instance.
     */
    public static function create()
    {
        return new Android();

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

    public function getIcon()
    {
        return $this->icon;

    }

    public function getRootParams()
    {
        return $this->rootParams;

    }

    public function getSound()
    {
        return $this->sound;

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

    public function setIcon($icon)
    {
        $this->icon = $icon;

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
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        $json = array();

        isset($this->banner) ? $json['android_banner'] = $this->banner : false;
        isset($this->customIcon) ? $json['android_custom_icon'] = $this->customIcon : false;
        isset($this->gcmTtl) ? $json['android_gcm_ttl'] = $this->gcmTtl : false;
        isset($this->header) ? $json['android_header'] = $this->header : false;
        isset($this->icon) ? $json['android_icon'] = $this->icon : false;
        isset($this->rootParams) ? $json['android_root_params'] = $this->rootParams : false;
        isset($this->sound) ? $json['android_sound'] = $this->sound : false;

        return $json;

    }
}
