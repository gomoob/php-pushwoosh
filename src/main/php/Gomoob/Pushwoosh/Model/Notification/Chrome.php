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
     * Text of the first button
     *
     * @var string
     */
    private $buttonTextOne;

    /**
     * Url of the first button
     *
     * @var
     */
    private $buttonUrlOne;

    /**
     * Text of the second button
     *
     * @var string
     */
    private $buttonTextTwo;

    /**
     * Url of the second button
     *
     * @var
     */
    private $buttonUrlTwo;

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
     * Gets the text of the first button.
     *
     * @return string $text The text of the first button.
     */
    public function getButtonTextOne()
    {
        return $this->buttonTextOne;
    }

    /**
     * Gets the url of the first button.
     *
     * @return string $url The url of the first button.*
     */
    public function getButtonUrlOne($url)
    {
        return $this->buttonUrlOne;
    }

    /**
     * Gets the text of the second button.
     *
     * @return string $text The text of the second button.*
     */
    public function getButtonTextTwo()
    {
        return $this->buttonTextTwo;
    }

    /**
     * Gets the url of the second button.
     *
     * @return string $url The url of the second button.
     */
    public function getButtonUrlTwo()
    {
        return $this->buttonUrlTwo;
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
        isset($this->buttonTextOne) ? $json['chrome_button_text1'] = $this->buttonTextOne : false;
        isset($this->buttonUrlOne) ? $json['chrome_button_url1'] = $this->buttonUrlOne : false;
        isset($this->buttonTextTwo) ? $json['chrome_button_text2'] = $this->buttonTextTwo : false;
        isset($this->buttonUrlTwo) ? $json['chrome_button_url2'] = $this->buttonUrlTwo : false;

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

    /**
     * Sets the text of the first button.
     *
     * @param string $text The text of the first button.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setButtonTextOne($text)
    {
        $this->buttonTextOne = $text;

        return $this;
    }

    /**
     * Sets the url of the first button.
     *
     * @param string $url The url of the first button.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setButtonUrlOne($url)
    {
        $this->buttonUrlOne = $url;

        return $this;
    }

    /**
     * Sets the text of the second button.
     *
     * @param string $text The text of the second button.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setButtonTextTwo($text)
    {
        $this->buttonTextTwo = $text;

        return $this;
    }

    /**
     * Sets the url of the second button.
     *
     * @param string $url The url of the second button.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Chrome this instance.
     */
    public function setButtonUrlTwo($url)
    {
        $this->buttonUrlTwo = $url;

        return $this;
    }
}
