<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/createMessage' response response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CreateMessageResponseResponse
{
    /**
     * The Pushwoosh messages sent in response to a Create Message request.
     *
     * @var string[]
     */
    private $messages;

    /**
     * Gets the Pushwoosh messages sent in response to a Create Message request.
     *
     * @return string[]
     */
    public function getMessages()
    {
        return $this->messages;

    }

    /**
     * Sets the Pushwoosh messages sent in response to a Create Message request.
     *
     * @param string[] $messages the Pushwoosh messages sent in response to a Create Message Request.
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;

    }
}
