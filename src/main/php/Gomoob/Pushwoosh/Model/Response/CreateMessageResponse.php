<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/createMessage' response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CreateMessageResponse extends AbstractResponse
{
    /**
	 * Gets the Pushwoosh response.
	 *
	 * @var \Gomoob\Pushwoosh\Model\Response\CreateMessageResponseResponse
	 */
    private $response;

    /**
	 * Utility function used to create a new instance from a JSON string.
	 *
	 * @param array $json a PHP array which contains the result of a 'json_decode' execution.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Response\CreateMessageResponse the resulting instance.
	 */
    public static function create(array $json)
    {
        $createMessageResponse = new CreateMessageResponse();
        $createMessageResponse->setStatusCode($json['status_code']);
        $createMessageResponse->setStatusMessage($json['status_message']);

        $createMessageResponseResponse = new CreateMessageResponseResponse();
        $createMessageResponseResponse->setMessages($json['response']['Messages']);
        $createMessageResponse->setResponse($createMessageResponseResponse);

        return $createMessageResponse;

    }

    /**
	 * Gets the Pushwoosh response.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Response\CreateMessageResponseResponse the Pushwoosh response.
	 */
    public function getResponse()
    {
        return $this->response;

    }

    /**
	 * Sets the Pushwoosh response.
	 *
	 * @param \Gomoob\Pushwoosh\Model\Response\CreateMessageResponseResponse $response the Pushwoosh response.
	 */
    public function setResponse($response)
    {
        $this->response = $response;

    }
}
