<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/getNearestZone' response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class GetNearestZoneResponse extends AbstractResponse
{
    /**
     * Gets the Pushwoosh '/getNearestZone' response response.
     *
     * @var \Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponseResponse
     */
    private $response;

    /**
     * Utility function used to create a new instance from a JSON string.
     *
     * @param array $json a PHP array which contains the result of a 'json_decode' execution.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponse the resulting instance.
     */
    public static function create(array $json)
    {
        $getNearestZoneResponse = new GetNearestZoneResponse();
        $getNearestZoneResponse->setStatusCode($json['status_code']);
        $getNearestZoneResponse->setStatusMessage($json['status_message']);

        // If a 'response' is provided
        if (array_key_exists('response', $json) && isset($json['response'])) {
            $getNearestZoneResponseResponse = new GetNearestZoneResponseResponse();
            $getNearestZoneResponseResponse->setDistance($json['response']['distance']);
            $getNearestZoneResponseResponse->setLat($json['response']['lat']);
            $getNearestZoneResponseResponse->setLng($json['response']['lng']);
            $getNearestZoneResponseResponse->setName($json['response']['name']);
            $getNearestZoneResponseResponse->setRange($json['response']['range']);
            $getNearestZoneResponse->setResponse($getNearestZoneResponseResponse);

        }

        return $getNearestZoneResponse;
    }

    /**
     * Gets the Pushwoosh '/getNearestZone' response response.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponseResponse the Pushwoosh'/getNearestZone' response
     *         response.
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets the Pushwoosh'/getNearestZone' response response.
     *
     * @param \Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponseResponse $response the Pushwoosh '/getNearestZone'
     *        response response.
     */
    public function setResponse(GetNearestZoneResponseResponse $response)
    {
        $this->response = $response;
    }
}
