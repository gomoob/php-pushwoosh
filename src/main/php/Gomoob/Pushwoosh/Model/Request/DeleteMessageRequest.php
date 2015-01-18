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
 * Class which represents Pushwoosh '/deleteMessage' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class DeleteMessageRequest
{
    /**
     * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
     *
     * @var string
     */
    private $auth;

    /**
     * The message code obtained in createMessage.
     *
     * @var string
     */
    private $message;

    /**
     * Utility function used to create a new instance of the <tt>DeleteMessageRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest the new created instance.
     */
    public static function create()
    {
        return new DeleteMessageRequest();

    }

    /**
     * Gets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @return string the API access token from the Pushwoosh control panel (create this token at
     *         https://cp.pushwoosh.com/api_access).
     */
    public function getAuth()
    {
        return $this->auth;

    }

    /**
     * Gets the message code obtained in createMessage.
     *
     * @return string the message code obtained in createMessage.
     */
    public function getMessage()
    {
        return $this->message;

    }

    /**
     * Sets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @param string $auth the API access token from the Pushwoosh control panel (create this token at
     *        https://cp.pushwoosh.com/api_access).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest this instance.
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;

        return $this;

    }

    /**
     * Sets the message code obtained in createMessage.
     *
     * @param string $message the message code obtained in createdMessage.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest this instance.
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;

    }

    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        // The 'auth' parameter must have been set
        if (!isset($this->auth)) {
            throw new PushwooshException('The \'auth\' property is not set !');

        }

        // The 'message' parameter must have been set
        if (!isset($this->message)) {
            throw new PushwooshException('The \'message\' property is not set !');

        }

        return array(
            'auth' => $this->auth,
            'message' => $this->message
        );

    }
}
