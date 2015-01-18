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
 * Class which represents Pushwoosh '/getNearestZone' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class GetNearestZoneRequest
{
    /**
     * The Pushwoosh application ID where you send the message to.
     *
     * @var string
     */
    private $application;

    /**
     * The hardware device id used in registerDevice function call.
     *
     * @var string
     */
    private $hwid;

    /**
     * The latitude of the device.
     *
     * @var float
     */
    private $lat;

    /**
     * The longitude of the device.
     *
     * @var float
     */
    private $lng;

    /**
     * Utility function used to create a new instance of the <tt>GetNearestZoneRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest the new created instance.
     */
    public static function create()
    {
        return new GetNearestZoneRequest();

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
     * Gets the hardware device id used in registerDevice function call.
     *
     * @return string the hardware device id used in registerDevice function call.
     */
    public function getHwid()
    {
        return $this->hwid;

    }

    /**
     * Gets the latitude of the device.
     *
     * @return float the latitude of the device.
     */
    public function getLat()
    {
        return $this->lat;

    }

    /**
     * Gets the longitude of the device.
     *
     * @return float the longitude of the device.
     */
    public function getLng()
    {
        return $this->lng;

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
     * Sets the latitude of the device.
     *
     * @param float $lat the latitude of the device.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;

    }

    /**
     * Sets the longitude of the device.
     *
     * @param float $lng the longitude of the device.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest this instance.
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

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

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');

        }

        // The 'lat' parameter must have been defined
        if (!isset($this->lat)) {
            throw new PushwooshException('The \'lat\' property is not set !');

        }

        // The 'lng' parameter must have been defined
        if (!isset($this->lng)) {
            throw new PushwooshException('The \'lng\' property is not set !');

        }

        return array(
            'application' => $this->application,
            'hwid' => $this->hwid,
            'lat' => $this->lat,
            'lng' => $this->lng
        );

    }
}
