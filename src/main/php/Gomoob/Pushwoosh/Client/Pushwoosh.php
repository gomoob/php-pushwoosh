<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\ICURLClient;
use Gomoob\Pushwoosh\IPushwoosh;
use Gomoob\Pushwoosh\Exception\PushwooshException;

use Gomoob\Pushwoosh\Model\IRequest;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest;
use Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest;
use Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest;
use Gomoob\Pushwoosh\Model\Request\GetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\PushStatRequest;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\SetBadgeRequest;
use Gomoob\Pushwoosh\Model\Request\SetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;

use Gomoob\Pushwoosh\Model\Response\CreateMessageResponse;
use Gomoob\Pushwoosh\Model\Response\CreateTargetedMessageResponse;
use Gomoob\Pushwoosh\Model\Response\DeleteMessageResponse;
use Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponse;
use Gomoob\Pushwoosh\Model\Response\GetTagsResponse;
use Gomoob\Pushwoosh\Model\Response\PushStatResponse;
use Gomoob\Pushwoosh\Model\Response\RegisterDeviceResponse;
use Gomoob\Pushwoosh\Model\Response\SetBadgeResponse;
use Gomoob\Pushwoosh\Model\Response\SetTagsResponse;
use Gomoob\Pushwoosh\Model\Response\UnregisterDeviceResponse;

/**
 * Class which defines a Pushwoosh client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Pushwoosh implements IPushwoosh // NOSONAR
{
    /**
     * The the Pushwoosh application ID to be used by default by all the requests performed by the Pushwoosh client.
     * This identifier can be overwritten by request if needed.
     *
     * @var string
     */
    private $application;

    /**
     * The Pushwoosh applications group code to be used to defautl by all the requests performed by the Pushwoosh client
     * . This identifier can be overwritten by requests if needed.
     *
     * <p>WARNING: If the application is defined then the applications groups must not be defined.</p>
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
     * A CURL client used to request the Pushwoosh Web Services.
     *
     * @var \Gomoob\Pushwoosh\ICURLClient
     */
    private $cURLClient;

    /**
     * Create a new instance of the Pushwoosh client.
     *
     * @param string $apiUrl (Optional) the root URL to the API server to use, if this parameter is not provided then
     *        the default API URL will be equal to `https://cp.pushwoosh.com/json/1.3`. If you have an enterprise
     *        Pushwoosh plan then you have a dedicated API server URL like `https://your-company.pushwoosh.com`, you can
     *        provide this custom API server URL here.
     */
    public function __construct($apiUrl = ICURLClient::DEFAULT_API_URL)
    {
        $this->cURLClient = new CURLClient($apiUrl);
    }

    /**
     * Utility function used to create a new instance of the Pushwoosh client.
     *
     * @param string $apiUrl (Optional) the root URL to the API server to use, if this parameter is not provided then
     *        the default API URL will be equal to `https://cp.pushwoosh.com/json/1.3`. If you have an enterprise
     *        Pushwoosh plan then you have a dedicated API server URL like `https://your-company.pushwoosh.com`, you can
     *        provide this custom API server URL here.
     *
     * @return \Gomoob\Pushwoosh\Client\Pushwoosh the new created instance.
     */
    public static function create($apiUrl = ICURLClient::DEFAULT_API_URL)
    {
        return new Pushwoosh($apiUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function createMessage(CreateMessageRequest $createMessageRequest)
    {
        // If both the 'application' and 'applicationsGroup' attribute are not set in the request we try to get a
        // default one from the Pushwoosh client
        if ($createMessageRequest->getApplication() === null && $createMessageRequest->getApplicationsGroup() === null
        ) {
            // Setting both 'application' and 'applicationsGroup' is forbidden
            if (!isset($this->application) && !isset($this->applicationsGroup)) {
                throw new PushwooshException(
                    'None of the  \'application\' or \'applicationsGroup\' properties are set !'
                );

                // Setting both the 'application' and 'applicationsGroup' parameters is an error here
            } elseif (isset($this->application) && isset($this->applicationsGroup)) {
                throw new PushwooshException('Both \'application\' and \'applicationsGroup\' properties are set !');

                // Sets the 'application' attribute
            } elseif (isset($this->application)) {
                $createMessageRequest->setApplication($this->application);

                // Sets the 'applicationsGroup' attribute
            } elseif (isset($this->applicationsGroup)) {
                $createMessageRequest->setApplicationsGroup($this->applicationsGroup);
            }
        }

        // If the 'auth' parameter is not set in the request we try to get it from the Pushwoosh client
        $this->setAuthIfNotSet($createMessageRequest);

        $response = $this->cURLClient->pushwooshCall('createMessage', $createMessageRequest->jsonSerialize());

        return CreateMessageResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function createTargetedMessage(CreateTargetedMessageRequest $createTargetedMessageRequest)
    {
        // If the 'auth' parameter is not set in the request we try to get it from the Pushwoosh client
        $this->setAuthIfNotSet($createTargetedMessageRequest);

        $response = $this->cURLClient->pushwooshCall(
            'createTargetedMessage',
            $createTargetedMessageRequest->jsonSerialize()
        );

        return CreateTargetedMessageResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteMessage(DeleteMessageRequest $deleteMessageRequest)
    {
        // If the 'auth' parameter is not set in the request we try to get it from the Pushwoosh client
        $this->setAuthIfNotSet($deleteMessageRequest);

        $response = $this->cURLClient->pushwooshCall('deleteMessage', $deleteMessageRequest->jsonSerialize());

        return DeleteMessageResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * {@inheritDoc}
     */
    public function getApplicationsGroup()
    {
        return $this->applicationsGroup;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * Gets the CURL client used to request the Pushwoosh Web Services.
     *
     * @return \Gomoob\Pushwoosh\ICURLClient the CURL client used to request the Pushwoosh Web Services.
     */
    public function getCURLClient()
    {
        return $this->cURLClient;
    }

    /**
     * {@inheritDoc}
     */
    public function getNearestZone(GetNearestZoneRequest $getNearestZoneRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($getNearestZoneRequest);

        $response = $this->cURLClient->pushwooshCall('getNearestZone', $getNearestZoneRequest->jsonSerialize());

        return GetNearestZoneResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function getTags(GetTagsRequest $getTagsRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($getTagsRequest);

        // If the 'auth' parameter is not set in the request we try to get it from the Pushwoosh client
        $this->setAuthIfNotSet($getTagsRequest);

        $response = $this->cURLClient->pushwooshCall('getTags', $getTagsRequest->jsonSerialize());

        return GetTagsResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function pushStat(PushStatRequest $pushStatRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($pushStatRequest);

        $response = $this->cURLClient->pushwooshCall('pushStat', $pushStatRequest->jsonSerialize());

        return PushStatResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function registerDevice(RegisterDeviceRequest $registerDeviceRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($registerDeviceRequest);

        $response = $this->cURLClient->pushwooshCall('registerDevice', $registerDeviceRequest->jsonSerialize());

        return RegisterDeviceResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setApplicationsGroup($applicationsGroup)
    {
        $this->applicationsGroup = $applicationsGroup;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setBadge(SetBadgeRequest $setBadgeRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($setBadgeRequest);

        $response = $this->cURLClient->pushwooshCall('setBadge', $setBadgeRequest->jsonSerialize());

        return SetBadgeResponse::create($response);
    }

    /**
     * Sets the CURL client used to request the Pushwoosh Web Services.
     *
     * @param \Gomoob\Pushwoosh\ICURLClient $cURLClient the CURL client used to request the Pushwoosh Web Services.
     *
     * @return \Gomoob\Pushwoosh\IPushwoosh this instance.
     */
    public function setCURLClient(ICURLClient $cURLClient)
    {
        $this->cURLClient = $cURLClient;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setTags(SetTagsRequest $setTagsRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($setTagsRequest);

        $response = $this->cURLClient->pushwooshCall('setTags', $setTagsRequest->jsonSerialize());

        return SetTagsResponse::create($response);
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterDevice(UnregisterDeviceRequest $unregisterDeviceRequest)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        $this->setApplicationIfNotSet($unregisterDeviceRequest);

        $response = $this->cURLClient->pushwooshCall('unregisterDevice', $unregisterDeviceRequest->jsonSerialize());

        return UnregisterDeviceResponse::create($response);
    }

    /**
     * Function used to check if the `application` parameter is set on a Pushwoosh request and if no try to set it from
     * the Pushwoosh client `auth` parameter.
     *
     * @param \Gomoob\Pushwoosh\Model\IRequest $request The Pushwoosh request to update.
     */
    private function setApplicationIfNotSet(IRequest $request)
    {
        // If the 'application' attribute is not set in the request we try to get a default one from the Pushwoosh
        // client
        if ($request->getApplication() === null) {
            // The 'application' must be set
            if (!isset($this->application)) {
                throw new PushwooshException('The  \'application\' property is not set !');
            }

            $request->setApplication($this->application);
        }
    }

    /**
     * Function used to check if the `auth` parameter is set on a Pushwoosh request and if no try to set it from the
     * Pushwoosh client `auth` parameter.
     *
     * @param \Gomoob\Pushwoosh\Model\IRequest $request The Pushwoosh request to update.
     */
    private function setAuthIfNotSet(IRequest $request)
    {
        // If the 'auth' parameter is not set in the request we try to get it from the Pushwoosh client
        if ($request->getAuth() === null) {
            // The 'auth' parameter is expected here
            if (!isset($this->auth)) {
                throw new PushwooshException('The \'auth\' parameter is not set !');

                // Use the 'auth' parameter defined in the Pushwoosh client
            } else {
                $request->setAuth($this->auth);
            }
        }
    }
}
