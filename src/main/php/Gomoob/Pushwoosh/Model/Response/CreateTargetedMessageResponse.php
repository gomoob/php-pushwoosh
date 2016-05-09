<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/createTargetedMessage' response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CreateTargetedMessageResponse extends AbstractResponse
{
    /**
     * Gets the Pushwoosh '/createTargetedMessage' response response.
     *
     * @var \Gomoob\Pushwoosh\Model\Response\CreateTargetedMessageResponseResponse
     */
    private $response;
    
    /**
     * Utility function used to create a new instance from a JSON string.
     *
     * @param array $json a PHP array which contains the result of a 'json_decode' execution.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\CreateTargetedMessageResponse the resulting instance.
     */
    public static function create(array $json)
    {
        $createTargetedMessageResponse = new CreateTargetedMessageResponse();
        $createTargetedMessageResponse->setStatusCode($json['status_code']);
        $createTargetedMessageResponse->setStatusMessage($json['status_message']);
    
        // If a 'response' is provided
        if (array_key_exists('response', $json) && isset($json['response'])) {
            $createTargetedMessageResponseResponse = new CreateTargetedMessageResponseResponse();
    
            // If 'messageCode' is provided
            if (array_key_exists('messageCode', $json['response'])) {
                $createTargetedMessageResponseResponse->setMessageCode($json['response']['messageCode']);
            }
    
            $createTargetedMessageResponse->setResponse($createTargetedMessageResponseResponse);
        }
    
        return $createTargetedMessageResponse;
    }
    
    /**
     * Gets the Pushwoosh '/createTargetedMessage' response response.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\CreateTargetedMessageResponseResponse the Pushwoosh
     *         '/createTargetedMessage' response response.
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    /**
     * Sets the Pushwoosh '/createTargetedMessage' response response.
     *
     * @param \Gomoob\Pushwoosh\Model\Response\CreateTargetedMessageResponseResponse $response the Pushwoosh
     *        '/createTargetedMessage' response response.
     */
    public function setResponse(CreateTargetedMessageResponseResponse $response)
    {
        $this->response = $response;
    }
}
