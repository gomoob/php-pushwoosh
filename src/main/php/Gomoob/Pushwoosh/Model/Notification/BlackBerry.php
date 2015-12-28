<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents specific Pushwoosh notification informations for BlackBerry.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class BlackBerry implements \JsonSerializable
{
    private $header;

    /**
     * Utility function used to create a new BlackBerry instance.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\BlackBerry the new created instance.
     */
    public static function create()
    {
        return new BlackBerry();

    }

    public function getHeader()
    {
        return $this->header;

    }
    
    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $json = [];
    
        isset($this->header) ? $json['blackberry_header'] = $this->header : false;
    
        return $json;
    
    }

    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }
}
