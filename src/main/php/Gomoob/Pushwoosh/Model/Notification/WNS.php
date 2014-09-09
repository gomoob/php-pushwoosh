<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for WNS (Windows Notification Service).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class WNS
{
    private $content;
    private $tag;
    private $type;

    public function getContent()
    {
        return $this->content;

    }

    public function getTag()
    {
        return $this->tag;

    }

    public function getType()
    {
        return $this->typ;

    }

    public function setContent($content)
    {
        $this->content = $content;

    }

    public function setTag($tag)
    {
        $this->tags = $tag;

    }

    public function setType($type)
    {
        $this->type = $type;

    }
}
