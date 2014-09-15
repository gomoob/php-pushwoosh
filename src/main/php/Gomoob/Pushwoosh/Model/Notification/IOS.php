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
    private $aps;
    private $apnsTrimContent;
    private $badges;
    private $contentAvailable;
    private $rootParams;
    private $sound;
    private $ttl;

    /**
	 * Utility function used to create a new IOS instance.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Notification\IOS the new created instance.
	 */
    public static function create()
    {
        return new IOS();

    }

    public function getAps()
    {
        return $this->aps;

    }

    public function getApnsTrimContent()
    {
        return $this->apnsTrimContent;

    }

    public function getBadges()
    {
        return $this->badges;

    }

    public function getContentAvailable()
    {
        return $this->contentAvailable;

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

    public function setAps($aps)
    {
        $this->aps = $aps;

        return $this;

    }

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

    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;

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

        isset($this->aps) ? $json['ios_aps'] = $this->aps : false;
        isset($this->apnsTrimContent) ? $json['apns_trim_content'] = $this->apnsTrimContent : false;
        isset($this->badges) ? $json['ios_badges'] = $this->badges : false;
        isset($this->contentAvailable) ? $json['ios_content_available'] = $this->contentAvailable : false;
        isset($this->sound) ? $json['ios_sound'] = $this->sound : false;
        isset($this->rootParams) ? $json['ios_root_params'] = $this->rootParams : false;
        isset($this->ttl) ? $json['ios_ttl'] = $this->ttl : false;

        return $json;

    }
}
