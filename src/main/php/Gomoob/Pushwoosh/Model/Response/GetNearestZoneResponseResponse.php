<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/getNearestZone' response response.
 *
 * <p>
 *     An instance of this objects represent the nearest zone to the position provided in the '/getNearestZone' request.
 * </p>
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class GetNearestZoneResponseResponse
{
    /**
     * The distance of the device from the nearest zone in meters.
     *
     * @var int
     */
    private $distance;

    /**
     * The latitude of the nearest zone.
     *
     * @var float
     */
    private $lat;

    /**
     * The longitude of the nearest zone.
     *
     * @var float
     */
    private $lng;

    /**
     * The name of the nearest zone.
     *
     * @var string
     */
    private $name;

    /**
     * The range of the nearest zone in meters.
     *
     * @var int
     */
    private $range;

    /**
     * Gets the distance of the device from the nearest zone in meters.
     *
     * @return int distance of the device from the nearest zone in meters.
     */
    public function getDistance()
    {
        return $this->distance;

    }

    /**
     * Gets the latitude of the nearest zone.
     *
     * @return float the latitude of the nearest zone.
     */
    public function getLat()
    {
        return $this->lat;

    }

    /**
     * Gets the longitude of the nearest zone.
     *
     * @return float the longitude of the nearest zone.
     */
    public function getLng()
    {
        return $this->lng;

    }

    /**
     * Gets the name of the nearest zone.
     *
     * @return string the name of the nearest zone.
     */
    public function getName()
    {
        return $this->name;

    }

    /**
     * Gets the range of the nearest zone in meters.
     *
     * @return int the range of the nearest zone in meters.
     */
    public function getRange()
    {
        return $this->range;

    }

    /**
     * Sets the distance of the device from the nearest zone in meters.
     *
     * @param int $distance the distance of the device from the nearest zone in meters.
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

    }

    /**
     * Sets the latitude of the nearest zone.
     *
     * @param float $lat the latitude of the nearest zone.
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

    }

    /**
     * Sets the longitude of the nearest zone.
     *
     * @param float $lng the longitude of the nearest zone.
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

    }

    /**
     * Sets the name of the nearest zone.
     *
     * @param string $name the name of the nearest zone.
     */
    public function setName($name)
    {
        $this->name = $name;

    }

    /**
     * Sets the range of the nearest zone in meters.
     *
     * @param int $range the range of the nearest zone in meters.
     */
    public function setRange($range)
    {
        $this->range = $range;

    }
}
