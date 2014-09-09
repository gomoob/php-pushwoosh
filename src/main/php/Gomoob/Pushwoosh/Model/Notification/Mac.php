<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
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
