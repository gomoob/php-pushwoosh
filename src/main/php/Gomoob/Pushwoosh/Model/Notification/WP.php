<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for Windows Phone.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class WP
{
    private $backbackground;
    private $background;
    private $backtitle;
    private $count;
    private $type;

    public function getBackbackground()
    {
        return $this->backbackground;

    }

    public function getBackground()
    {
        return $this->background;

    }

    public function getBacktitle()
    {
        return $this->backtitle;

    }

    public function getCount()
    {
        return $this->count;

    }

    public function getType()
    {
        return $this->type;

    }

    public function setBackbackground($backbackground)
    {
        $this->backbackground = $backbackground;

    }

    public function setBackground($background)
    {
        $this->background = $background;

    }

    public function setBacktitle($backtitle)
    {
        $this->backtitle = $backtitle;

    }

    public function setCount($count)
    {
        $this->count = $count;

    }

    public function setType($type)
    {
        $this->type = $type;

    }
}
