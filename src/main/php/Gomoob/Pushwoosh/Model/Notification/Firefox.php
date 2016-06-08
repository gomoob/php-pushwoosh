<?php


namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Mozilla Firefox.
 *
 * @author: Oleg Bespalov <o.bespalov@rambler-co.ru>
 */
class Firefox implements \JsonSerializable
{
    /**
     * The header of the message.
     *
     * @var string
     */
    private $title;

    /**
     * The full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @var string
     */
    private $icon;

    /**
     *  Utility function used to create a new Firefox instance.
     *
     * @return Firefox
     */
    public static function create()
    {
        return new Firefox();
    }

    /**
     * Gets the header of the message.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the header of the message.
     *
     * @param mixed $title
     * @return Firefox
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Sets the full path URL to the icon, or the path to the file in resources of the extension.
     *
     * @param mixed $icon
     * @return Firefox
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
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
}
