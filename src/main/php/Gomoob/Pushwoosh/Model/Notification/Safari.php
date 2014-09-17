<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Safari.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Safari
{
    private $action;
    private $title;
    private $ttl;
    private $url;

    /**
     * Utility function used to create a new Safari instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Mac the new created instance.
     */
    public static function create()
    {
        return new Safari();

    }

    public function getAction()
    {
        return $this->action;

    }

    public function getTitle()
    {
        return $this->title;

    }

    public function getTtl()
    {
        return $this->ttl;

    }

    public function getUrl()
    {
        return $this->url;

    }

    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;

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

        // TODO
        return $json;

    }
}
