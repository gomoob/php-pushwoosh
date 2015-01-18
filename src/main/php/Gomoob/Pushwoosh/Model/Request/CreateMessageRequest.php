<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use Gomoob\Pushwoosh\Model\Notification\Notification;

/**
 * Class which represents Pushwoosh '/createMessage' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CreateMessageRequest
{
    /**
     * The Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup").
     *
     * @var string
     */
    private $application;

    /**
     * The Pushwoosh Application group code (cannot be used together with "application").
     *
     * @var string
     */
    private $applicationsGroup;

    /**
     * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
     *
     * @var string
     */
    private $auth;

    /**
     * The Pushwoosh notifications to attach to the create message request.
     *
     * @var \Gomoob\Pushwoosh\Model\Notification\Notification[]
     */
    private $notifications;

    /**
     * Utility function used to create a new instance of the <tt>CreateMessageRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest the new created instance.
     */
    public static function create()
    {
        return new CreateMessageRequest();

    }

    /**
     * Adds a new Pushwoosh notification to the notifications attached to this create message request.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Notification $notification the new notification to add.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function addNotification(Notification $notification)
    {
        if (!isset($this->notifications)) {
            $this->notifications = array();

        }

        $this->notifications[] = $notification;

        return $this;

    }

    /**
     * Gets the Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup")
     * .
     *
     * @return string the Pushwoosh application ID where to send the message to (cannot be used together with
     *         "applicationsGroup").
     */
    public function getApplication()
    {
        return $this->application;

    }

    /**
     * Gets the Pushwoosh Application group code (cannot be used together with "application").
     *
     * @return string the Pushwoosh Application group code (cannot be used together with "application").
     */
    public function getApplicationsGroup()
    {
        return $this->applicationsGroup;

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
     * Gets the Pushwoosh notifications to attach to the create message request.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Notification[] the Pushwoosh notifications to attach to the create
     *         message request.
     */
    public function getNotifications()
    {
        return $this->notifications;

    }

    /**
     * Sets the Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup")
     * .
     *
     * @param string $application the Pushwoosh application ID where to send the message to (cannot be used together
     *        with "applicationsGroup").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;

    }

    /**
     * Sets the Pushwoosh Application group code (cannot be used together with "application").
     *
     * @param string $applicationsGroup the Pushwoosh Application group code (cannot be used together with
     *        "application").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplicationsGroup($applicationsGroup)
    {
        $this->applicationsGroup = $applicationsGroup;

        return $this;

    }

    /**
     * Sets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @param string $auth the API access token from the Pushwoosh control panel (create this token at
     *        https://cp.pushwoosh.com/api_access).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;

        return $this;

    }

    /**
     * Sets the Pushwoosh notifications to attach to the create message request.
     *
     * @param \Gomoob\Pushwoosh\Model\Notification\Notification[] $notifications the Pushwoosh notifications to attach
     *        to the create message request.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setNotifications(array $notifications)
    {
        $this->notifications = $notifications;

        return $this;

    }

    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        // One of the 'application' or 'applicationsGroup' parameter must have been defined.
        if (!isset($this->application) && !isset($this->applicationsGroup)) {
            throw new PushwooshException('None of the \'application\' or \'applicationsGroup\' properties are set !');

        }

        // If the 'application' or 'applicationsGroup' parameters are both set this is an error
        if (isset($this->application) && isset($this->applicationsGroup)) {
            throw new PushwooshException('Both \'application\' and \'applicationsGroup\' properties are set !');

        }

        // The 'auth' parameter must have been set
        if (!isset($this->auth)) {
            throw new PushwooshException('The \'auth\' property is not set !');

        }

        $json = array(
            'application' => $this->application,
            'applicationsGroup' => $this->applicationsGroup,
            'auth' => $this->auth,
            'notifications' => array()
        );

        // Adds the notifications
        // Please note that the Pushwoosh REST API seems to authorize calls to the 'createMessage' service with a create
        // message request which do not define any notification. This is authorized but has no effect.
        if (isset($this->notifications)) {
            foreach ($this->notifications as $notification) {
                $json['notifications'][] = $notification->toJSON();

            }

        }

        return $json;

    }
}
