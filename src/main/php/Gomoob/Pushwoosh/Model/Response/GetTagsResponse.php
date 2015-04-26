<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/getTags' response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class GetTagsResponse extends AbstractResponse
{
    /**
     * Gets the Pushwoosh '/getTags' response response.
     *
     * @var \Gomoob\Pushwoosh\Model\Response\GetTagsResponseResponse
     */
    private $response;

    /**
     * Utility function used to create a new instance from a JSON string.
     *
     * @param array $json a PHP array which contains the result of a 'json_decode' execution.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\GetTagsResponse the resulting instance.
     */
    public static function create(array $json)
    {
        $getTagsResponse = new GetTagsResponse();
        $getTagsResponse->setStatusCode($json['status_code']);
        $getTagsResponse->setStatusMessage($json['status_message']);

        // If a 'response' is provided
        if (array_key_exists('response', $json) && isset($json['response'])) {
            $getTagsResponseResponse = new GetTagsResponseResponse();

            // If a 'result' is provided
            if (array_key_exists('result', $json['response'])) {
                $getTagsResponseResponse->setResult($json['response']['result']);

            }

            $getTagsResponse->setResponse($getTagsResponseResponse);

        }

        return $getTagsResponse;
    }

    /**
     * Gets the Pushwoosh '/getTags' response response.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\GetTagsResponseResponse the Pushwoosh '/createMessage' response
     *         response.
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets the Pushwoosh '/getTags' response response.
     *
     * @param \Gomoob\Pushwoosh\Model\Response\GetTagsResponseResponse $response the Pushwoosh '/createMessage'
     *        response response.
     */
    public function setResponse(GetTagsResponseResponse $response)
    {
        $this->response = $response;
    }
}
