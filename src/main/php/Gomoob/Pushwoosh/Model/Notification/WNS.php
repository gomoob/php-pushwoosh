<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
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

    /**
     * Utility function used to create a new WNS instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Mac the new created instance.
     */
    public static function create()
    {
        return new WNS();

    }

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
        return $this->type;

    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;

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

        isset($this->content) ? $json['wns_content'] = $this->content : false;
        isset($this->tag) ? $json['wns_tag'] = $this->tag : false;
        isset($this->type) ? $json['wns_type'] = $this->type : false;

        return $json;

    }
}
