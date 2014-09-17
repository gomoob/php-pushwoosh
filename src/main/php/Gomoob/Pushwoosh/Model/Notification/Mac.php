<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Mac OS X.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Mac
{
    private $badges;
    private $rootParams;
    private $sound;
    private $ttl;

    /**
     * Utility function used to create a new Mac instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Mac the new created instance.
     */
    public static function create()
    {
        return new Mac();

    }

    public function getBadges()
    {
        return $this->badges;

    }

    public function getRootParams()
    {
        return $this->rootParams;

    }

    public function getSound()
    {
        return $this->sound;

    }

    public function getTtl()
    {
        return $this->ttl;

    }

    public function setBadges($badges)
    {
        $this->badges = $badges;

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

    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

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

        isset($this->badges) ? $json['mac_badges'] = $this->badges : false;
        isset($this->rootParams) ? $json['mac_root_params'] = $this->rootParams : false;
        isset($this->sound) ? $json['mac_sound'] = $this->sound : false;
        isset($this->ttl) ? $json['mac_ttl'] = $this->ttl : false;

        return $json;

    }
}
