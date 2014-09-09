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

    }

    public function setTitle($title)
    {
        $this->title = $title;

    }

    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

    }

    public function setUrl($url)
    {
        $this->url = $url;

    }
}
