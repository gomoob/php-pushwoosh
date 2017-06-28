<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Google Chrome.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Chrome implements \JsonSerializable
{
    /**
     * The time to live parameter - the maximum lifespan of a message in seconds.
     *
     * @var int
     */
    private $gcmTtl;

    /**
     * The full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @var string
     */
    private $icon;

    /**
     * The header of the message.
     *
     * @var string
     */
    private $title;

    /**
     * The image of the message.
     *
     * @var string
     */
    private $image;    
    
    /**
     * Utility function used to create a new Chrome instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome the new created instance.
     */
    public static function create()
    {
        return new Chrome();
    }

    /**
     * Gets the time to live parameter - the maximum lifespan of a message in seconds.
     *
     * @return int The time to live parameter.
     */
    public function getGcmTtl()
    {
        return $this->gcmTtl;
    }
    
    /**
     * Gets the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @return string the full path URL to the icon, or the path to the file in resources of the extension.
     */
    public function getIcon()
    {
        return $this->icon;
    }
    
    /**
     * Gets the header of the message.
     *
     * @var string The header of the message.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Gets the image of the message.
     *
     * @var string The image of the message.
     */
    public function getImage()
    {
        return $this->image;
    }    
    
    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $json = [];
    
        isset($this->gcmTtl) ? $json['chrome_gcm_ttl'] = $this->gcmTtl : false;
        isset($this->icon) ? $json['chrome_icon'] = $this->icon : false;
        isset($this->title) ? $json['chrome_title'] = $this->title : false;
        isset($this->image) ? $json['chrome_image'] = $this->image : false;
    
        return $json;
    
    }
    
    /**
     * Sets the time to live parameter - the maximum lifespan of a message in seconds.
     *
     * @param int $gcmTtl The time to live parameter.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setGcmTtl($gcmTtl)
    {
        $this->gcmTtl = $gcmTtl;
    
        return $this;
    }
    
    /**
     * Sets the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @param string $icon the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    
        return $this;
    }
    
    /**
     * Sets the header of the message.
     *
     * @param string $title The header of the message.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Sets the image of the message.
     *
     * @param string $image The image of the message.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }    
}
