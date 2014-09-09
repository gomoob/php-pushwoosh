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

    public function getBadges()
    {
        return $this->badges;

    }

    public function getRootParams()
    {
        return $this->rootParams;

    }

    public function setBadges($badges)
    {
        $this->badges = $badges;

    }

    public function getSound()
    {
        return $this->sound;

    }

    public function getTtl()
    {
        return $this->ttl;

    }

    public function setRootParams($rootParams)
    {
        $this->rootParams = $rootParams;

    }

    public function setSound($sound)
    {
        $this->sound = $sound;

    }

    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

    }
}
