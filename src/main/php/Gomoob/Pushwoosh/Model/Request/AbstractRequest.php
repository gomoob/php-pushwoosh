<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use Gomoob\Pushwoosh\Model\IRequest;

/**
 * Abstract class common to all Pushwoosh requests.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractRequest implements IRequest
{
    /**
     * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
     *
     * @var string
     */
    protected $auth;

    /**
     * {@inheritDoc}
     */
    public function getAuth()
    {
        // If the `auth` parameter is not supported we throw an exception
        if (!$this->isAuthSupported()) {
            throw new PushwooshException('This request does not support the \'auth\' parameter !');
        }

        return $this->auth;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuth($auth)
    {
        // If the `auth` parameter is not supported we throw an exception
        if (!$this->isAuthSupported()) {
            throw new PushwooshException('This request does not support the \'auth\' parameter !');
        }

        $this->auth = $auth;

        return $this;
    }
}
