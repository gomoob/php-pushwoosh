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
class IOS implements \JsonSerializable
{
    /**
     * //TODO: TO BE DOCUMENTED !
     *
     * @var boolean
     */
    private $apnsTrimContent;

    private $badges;
    
    /**
     * The iOS 8 category ID from Pushwoosh.
     *
     * @var int
     */
    private $categoryId;
    
    private $rootParams;
    private $sound;
    private $ttl;
    private $trimContent;
    private $title;
    private $subtitle;

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
    
    /**
     * Gets the iOS 8 category ID from Pushwoosh.
     *
     * @return int The iOS 8 category ID from Pushwoosh.
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getSubtitle()
    {
        return $this->subtitle;
    }
    
    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $json = [];
    
        isset($this->apnsTrimContent) ? $json['apns_trim_content'] = intval($this->apnsTrimContent) : false;
        isset($this->badges) ? $json['ios_badges'] = $this->badges : false;
        isset($this->categoryId) ? $json['ios_category_id'] = $this->categoryId : false;
        isset($this->rootParams) ? $json['ios_root_params'] = $this->rootParams : false;
        isset($this->sound) ? $json['ios_sound'] = $this->sound : false;
        isset($this->ttl) ? $json['ios_ttl'] = $this->ttl : false;
        isset($this->trimContent) ? $json['ios_trim_content'] = intval($this->trimContent) : false;
        isset($this->title) ? $json['ios_title'] = $this->title : false;
        isset($this->subtitle) ? $json['ios_subtitle'] = $this->subtitle : false;
    
        return $json;
    
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
    
    /**
     * Sets the iOS 8 category ID from Pushwoosh.
     *
     * @param int $categoryId The iOS 8 category ID from Pushwoosh.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\IOS this instance.
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
         
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
    
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        
        return $this;
    }
}
