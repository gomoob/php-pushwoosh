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
 * Class which represents Pushwoosh '/setBadge' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class SetBadgeRequest
{
    /**
     * The Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup").
     *
     * @var string
     */
    private $application;

    /**
     * The current badge on the application to use with auto-incrementing badges.
     *
     * @var int
     */
    private $badge;

    /**
     * The hardware device id used in registerDevice function call.
     *
     * @var string
     */
    private $hwid;

    /**
     * Utility function used to create a new instance of the <tt>SetBadgeRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\SetBadgeRequest the new created instance.
     */
    public static function create()
    {
        return new SetBadgeRequest();

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
     * Gets the current badge on the application to use with auto-incrementing badges.
     *
     * @return int the current badge on the application to use with auto-incrementing badges.
     */
    public function getBadge()
    {
        return $this->badge;
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
     * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;

    }

    /**
     * Sets the current badge on the application to use with auto-incrementing badges.
     *
     * @param int $badge the current badge on the application to use with auto-incrementing badges.
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Sets the hardware device id used in registerDevice function call.
     *
     * @param string $hwid the the hardware device id used in registerDevice function call.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
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

        // The 'badge' parameter must have been defined
        if (!isset($this->badge)) {
            throw new PushwooshException('The \'badge\' property is not set !');

        }

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');

        }

        return array(
            'application' => $this->application,
            'badge' => $this->badge,
            'hwid' => $this->hwid
        );

    }
}
