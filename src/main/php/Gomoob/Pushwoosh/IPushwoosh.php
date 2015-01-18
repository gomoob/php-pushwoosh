<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest;
use Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest;
use Gomoob\Pushwoosh\Model\Request\GetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\PushStatRequest;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\SetBadgeRequest;
use Gomoob\Pushwoosh\Model\Request\SetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;

/**
 * Interface which defines a Pushwoosh client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
interface IPushwoosh
{
    /**
     * Function used to create a Pushwoosh message using a '/createMessage' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest $createMessageRequest the '/createMessage' request
     *        used to create the Pushwoosh message.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\CreateMessageResponse the resulting '/createMessage' response.
     */
    public function createMessage(CreateMessageRequest $createMessageRequest);

    /**
     * Function used to delete a Pushwoosh message using a '/deleteMessage' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\DeletMessageRequest $deleteMessageRequest the '/deleteMessage' request
     *                                                                                  used to delete a Pushwoosh
     *                                                                                  message.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\DeleteMessageResponse the resulting '/deleteMessage' response.
     */
    public function deleteMessage(DeleteMessageRequest $deleteMessageRequest);

    /**
     * Gets the Pushwoosh application ID to be used by default by all the requests performed by the Pushwoosh client.
     * This identifier can be overwritten by request if needed.
     *
     * <p>WARNING: If the application group is defined then the application must not be defined.</p>
     *
     * @return string the Pushwoosh application ID to be used by default by all the requests performed by the Pushwoosh
     *         client.
     */
    public function getApplication();

    /**
     * Gets the Pushwoosh applications group code to be used to defautl by all the requests performed by the Pushwoosh
     * client. This identifier can be overwritten by requests if needed.
     *
     * <p>WARNING: If the application is defined then the applications groups must not be defined.</p>
     *
     * @return string the Pushwoosh applications group code to be used to defautl by all the requests performed by the
     *         Pushwoosh client.
     */
    public function getApplicationsGroup();

    /**
     * Gets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @return string the API access token from the Pushwoosh control panel (create this token at
     *         https://cp.pushwoosh.com/api_access).
     */
    public function getAuth();

    /**
     * Function used to record a device location for Geographical Push Notification using a '/getNearestZone' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest $getNearestZoneRequest the '/getNearestZone' request
     *                                                                                     used to record a device
     *                                                                                     location for Georgraphical
     *                                                                                     Push Notification.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponse the resulting '/getNearestZone' response.
     */
    public function getNearestZone(GetNearestZoneRequest $getNearestZoneRequest);

    /**
     * Function used to get the tags associated to a device using a '/getTags' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\GetTagsRequest $getTagsRequest the '/getTags' request used to get the tags
     *                                                                       associated to a specified device.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\GetTagsResponse the resulting '/getTags' response.
     */
    public function getTags(GetTagsRequest $getTagsRequest);

    /**
     * Function used to register a device for Push Open events using the '/pushStat' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\PushStatRequest $pushStatRequest the '/pushStat' request used to register
     *                                                                         a device for Push Open events.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\PushStatResponse the resulting '/pushStat' response.
     */
    public function pushStat(PushStatRequest $pushStatRequest);

    /**
     * Function used to register a device for an application using a '/registerDevice' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest $registerDeviceRequest the register device request
     *        used to register a device for the application.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\RegisterDeviceResponse the resulting register device response.
     */
    public function registerDevice(RegisterDeviceRequest $registerDeviceRequest);

    /**
     * Sets the Pushwoosh application ID to be used by default by all the requests performed by the Pushwoosh client.
     * This identifier can be overwritten by request if needed.
     *
     * <p>WARNING: If the application group is defined then the application must not be defined.</p>
     *
     * @param string $application the Pushwoosh application ID to be used by default by all the requests performed by
     *        the Pushwoosh client. This identifier can be overwritten by request if needed.
     *
     * @return \Gommob\Pushwoosh\IPushwoosh this instance.
     */
    public function setApplication($application);

    /**
     * Sets the Pushwoosh applications group code to be used to defautl by all the requests performed by the Pushwoosh
     * client. This identifier can be overwritten by requests if needed.
     *
     * <p>WARNING: If the application is defined then the applications groups must not be defined.</p>
     *
     * @param string $applicationsGroup the Pushwoosh applications group code to be used to defautl by all the requests
     *        performed by the Pushwoosh client.
     *
     * @return \Gommob\Pushwoosh\IPushwoosh this instance.
     */
    public function setApplicationsGroup($applicationsGroup);

    /**
     * Sets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @param string $auth the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @return \Gommob\Pushwoosh\IPushwoosh this instance.
     */
    public function setAuth($auth);

    /**
     * Function used to set the current badge for a device to let auto-incrementing badges work properly using the
     * '/setBadge' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\SetBadgeRequest $setBadgeRequest the '/setBadge' request used to set the
     *                                                                         current badge for a device to let
     *                                                                         auto-incrementing badges work properly.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\SetBadgeResponse the resulting '/setBadge' response.
     */
    public function setBadge(SetBadgeRequest $setBadgeRequest);

    /**
     * Function used to set tags for a device using a '/setTags' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\SetTagsRequest $setTagsRequest the '/setTags' request used to set tags for
     *        a device.
     *
     * @return \Gomoob\Pushwoosh\Model\Response\SetTagsResponse the resulting set tags response.
     */
    public function setTags(SetTagsRequest $setTagsRequest);

    /**
     * Function used to remove a device from an application using a '/unregisterDevice' request.
     *
     * @param \Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest $unregisterDeviceRequest the '/unregisterDevice'
     *        request used to unregister a device from an application.
     */
    public function unregisterDevice(UnregisterDeviceRequest $unregisterDeviceRequest);
}
