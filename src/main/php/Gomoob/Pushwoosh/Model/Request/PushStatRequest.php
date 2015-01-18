<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Class which represents Pushwoosh '/pushStat' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class PushStatRequest
{
    /**
     * The Pushwoosh application ID where you send the message to.
     *
     * @var string
     */
    private $application;

    /**
     * The tag received in push notification.
     *
     * @var string
     */
    private $hash;

    /**
     * The hardware device id used in registerDevice function call.
     *
     * @var string
     */
    private $hwid;

    /**
     * Utility function used to create a new instance of the <tt>PushStatRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest the new created instance.
     */
    public static function create()
    {
        return new PushStatRequest();

    }

    /**
     * Gets the Pushwoosh application ID where you send the message to.
     *
     * @return string Pushwoosh application ID where you send the message to.
     */
    public function getApplication()
    {
        return $this->application;

    }

    /**
     * Gets the tag received in push notification.
     *
     * @return string the tag received in push notification.
     */
    public function getHash()
    {
        return $this->hash;

    }

    /**
     * Gets the hardware device id used in registerDevice function call.
     *
     * @return string the hardware device id used in registerDevice function call.
     */
    public function getHwid()
    {
        return $this->hwid;

    }

    /**
     * Sets the Pushwoosh application ID where you send the message to.
     *
     * @param string $application Pushwoosh application ID where you send the message to.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;

    }

    /**
     * Sets the tag received in push notification.
     *
     * @param string $hash the tag received in push notification.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest this instance.
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;

    }

    /**
     * Sets the hardware device id used in registerDevice function call.
     *
     * @param string $hwid the the hardware device id used in registerDevice function call.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\PushStatRequest this instance.
     */
    public function setHwid($hwid)
    {
        $this->hwid = $hwid;

        return $this;

    }

    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        // The 'application' parameter must have been defined.
        if (!isset($this->application)) {
            throw new PushwooshException('The \'application\' property is not set !');

        }

        // The 'hash' parameter must have been defined.
        if (!isset($this->hash)) {
            throw new PushwooshException('The \'hash\' property is not set !');

        }

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');

        }

        return array(
            'application' => $this->application,
            'hash' => $this->hash,
            'hwid' => $this->hwid
        );

    }
}
