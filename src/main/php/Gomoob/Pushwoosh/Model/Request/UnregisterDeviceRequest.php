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
 * Class which represents Pushwoosh '/unregisterDevice' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class UnregisterDeviceRequest extends AbstractRequest
{
    /**
     * The Pushwoosh application ID for which one to register a new device.
     *
     * @var string
     */
    private $application;

    /**
     * The Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not allowed,
     * one of the alternative ways now is to use MAC address).
     *
     * @var string
     */
    private $hwid;

    /**
     * Utility function used to create a new instance of the <tt>UnregisterDeviceRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest the new created instance.
     */
    public static function create()
    {
        return new UnregisterDeviceRequest();
    }

    /**
     * Gets the Pushwoosh application ID for which one to register a new device.
     *
     * @return string the Pushwoosh application ID for which one to register a new device.
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Gets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
     * allowed, one of the alternative ways now is to use MAC address).
     *
     * @return string the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and
     *         not allowed, one of the alternative ways now is to use MAC address).
     */
    public function getHwid()
    {
        return $this->hwid;
    }

    /**
     * {@inheritDoc}
     */
    public function isAuthSupported()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        // The 'application' parameter must have been defined.
        if (!isset($this->application)) {
            throw new PushwooshException('The \'application\' property is not set !');
        }

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');
        }

        return [
            'application' => $this->application,
            'hwid' => $this->hwid
        ];
    }

    /**
     * Sets the Pushwoosh application ID for which one to register a new device.
     *
     * @param string $application the the Pushwoosh application ID for which one to register a new device.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Sets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
     * allowed, one of the alternative ways now is to use MAC address).
     *
     * @param string $hwid the Unique string to identify the device (Please note that accessing UDID on iOS is
     *        deprecated and not allowed, one of the alternative ways now is to use MAC address).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest this instance.
     */
    public function setHwid($hwid)
    {
        $this->hwid = $hwid;

        return $this;
    }
}
