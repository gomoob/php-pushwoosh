<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Mozilla Firefox.
 *
 * @author Oleg Bespalov <o.bespalov@rambler-co.ru>
 */
class Firefox implements \JsonSerializable
{
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
     *  Utility function used to create a new Firefox instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Firefox the new created instance.
     */
    public static function create()
    {
        return new Firefox();
    }
    
    /**
     * Get the full path URL to the icon, or the path to the file in resources of the extension.
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
     * @return string the header of the message.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $json = [];

        isset($this->icon) ? $json['firefox_icon'] = $this->icon : false;
        isset($this->title) ? $json['firefox_title'] = $this->title : false;

        return $json;
    }
    
    /**
     * Sets the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @param string $icon the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Firefox this instance.
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }
    
    /**
     * Sets the header of the message.
     *
     * @param string $title the header of the message to set.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Firefox this instance.
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}
