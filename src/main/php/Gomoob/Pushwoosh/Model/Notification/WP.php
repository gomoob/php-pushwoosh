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
    private $backcontent;
    private $background;
    private $backtitle;
    private $count;
    private $type;

    /**
     * Utility function used to create a new WP instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\WP the new created instance.
     */
    public static function create()
    {
        return new WP();

    }

    public function getBackbackground()
    {
        return $this->backbackground;

    }

    public function getBackcontent()
    {
        return $this->backcontent;

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

        return $this;
    }

    public function setBackcontent($backcontent)
    {
        $this->backcontent = $backcontent;

        return $this;
    }

    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    public function setBacktitle($backtitle)
    {
        $this->backtitle = $backtitle;

        return $this;
    }

    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;

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

        isset($this->backbackground) ? $json['wp_backbackground'] = $this->backbackground : false;
        isset($this->backcontent) ? $json['wp_backcontent'] = $this->backcontent : false;
        isset($this->background) ? $json['wp_background'] = $this->background : false;
        isset($this->backtitle) ? $json['wp_backtitle'] = $this->backtitle : false;
        isset($this->count) ? $json['wp_count'] = $this->count : false;
        isset($this->type) ? $json['wp_type'] = $this->type : false;

        return $json;

    }
}
