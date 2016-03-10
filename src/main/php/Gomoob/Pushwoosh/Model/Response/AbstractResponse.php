<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

use Gomoob\Pushwoosh\Model\IResponse;

/**
 * Abstract class common to all response objects.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractResponse implements IResponse
{
    /**
     * The Pushwoosh status code, the Pushwoosh API can return the following create message status codes :
     *  - 200    : (HTTP Status Code = 200) Message succesfully created.
     *  - 210    : (HTTP Status Code = 200) Argument error. See statusMessage for more info.
     *  - 400    : (HTTP Status Code = N/A) Malformed request string.
     *  - 500    : (HTTP Status Code = 500) Internal error.
     *
     * @var int
     */
    protected $statusCode;

    /**
     * The Pushwoosh status message.
     *
     * @var string
     */
    protected $statusMessage;

    /**
     * {@inheritDoc}
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * {@inheritDoc}
     */
    public function isOk()
    {
        return $this->statusCode === 200;
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }
}
