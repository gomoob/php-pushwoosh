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
 * Class which represents Pushwoosh '/getTags' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class GetTagsRequest
{
    /**
     * The Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup").
     *
     * @var string
     */
    private $application;

    /**
     * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
     *
     * @var string
     */
    private $auth;

    /**
     * The hardware device id used in registerDevice function call.
     *
     * @var string
     */
    private $hwid;

    /**
     * Utility function used to create a new instance of the <tt>GetTagsRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\GetTagsRequest the new created instance.
     */
    public static function create()
    {
        return new GetTagsRequest();

    }

    /**
     * Gets the Pushwoosh application ID where to send the message to.
     *
     * @return string the Pushwoosh application ID where to send the message to.
     */
    public function getApplication()
    {
        return $this->application;

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
     * Gets the hardware device id used in registerDevice function call.
     *
     * @return string the hardware device id used in registerDevice function call.
     */
    public function getHwid()
    {
        return $this->hwid;

    }

    /**
     * Sets the Pushwoosh application ID where to send the message to.
     *
     * @param string $application the Pushwoosh application ID where to send the message to.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;

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

        // The 'auth' parameter must have been set
        if (!isset($this->auth)) {
            throw new PushwooshException('The \'auth\' property is not set !');

        }

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');

        }

        return array(
            'application' => $this->application,
            'auth' => $this->auth,
            'hwid' => $this->hwid
        );

    }
}
