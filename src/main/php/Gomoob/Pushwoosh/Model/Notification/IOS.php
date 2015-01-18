<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for IOS (Apple Push Notification Service).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class IOS
{
    /**
     * //TODO: TO BE DOCUMENTED !
     *
     * @var boolean
     */
    private $apnsTrimContent;

    private $badges;
    private $rootParams;
    private $sound;
    private $ttl;
    private $trimContent;

    /**
     * Utility function used to create a new IOS instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\IOS the new created instance.
     */
    public static function create()
    {
        return new IOS();

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

    /**
     * TODO: TO BE DOCUMENTED !
     *
     * @return boolean
     */
    public function isApnsTrimContent()
    {
        return $this->apnsTrimContent;

    }

    public function isTrimContent()
    {
        return $this->trimContent;

    }

    /**
     * TODO: TO BE DOCUMENTED !
     *
     * @param boolean $apnsTrimContent
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\IOS this instance.
     */
    public function setApnsTrimContent($apnsTrimContent)
    {
        $this->apnsTrimContent = $apnsTrimContent;

        return $this;

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

    public function setTrimContent($trimContent)
    {
        $this->trimContent = $trimContent;

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

        isset($this->apnsTrimContent) ? $json['apns_trim_content'] = intval($this->apnsTrimContent) : false;
        isset($this->badges) ? $json['ios_badges'] = $this->badges : false;
        isset($this->rootParams) ? $json['ios_root_params'] = $this->rootParams : false;
        isset($this->sound) ? $json['ios_sound'] = $this->sound : false;
        isset($this->ttl) ? $json['ios_ttl'] = $this->ttl : false;
        isset($this->trimContent) ? $json['ios_trim_content'] = intval($this->trimContent) : false;

        return $json;

    }
}
