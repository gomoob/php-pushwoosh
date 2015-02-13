<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\IPushwoosh;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest;
use Gomoob\Pushwoosh\Model\Request\GetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\PushStatRequest;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\SetBadgeRequest;
use Gomoob\Pushwoosh\Model\Request\SetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest;
use Gomoob\Pushwoosh\Model\Response\UnregisterDeviceResponse;
use Gomoob\Pushwoosh\Model\Response\RegisterDeviceResponse;
use Gomoob\Pushwoosh\Model\Response\CreateMessageResponse;
use Gomoob\Pushwoosh\Model\Response\DeleteMessageResponse;
use Gomoob\Pushwoosh\Model\Response\SetTagsResponse;
use Gomoob\Pushwoosh\Model\Response\SetBadgeResponse;
use Gomoob\Pushwoosh\Model\Response\PushStatResponse;
use Gomoob\Pushwoosh\Model\Response\GetNearestZoneResponse;
use Gomoob\Pushwoosh\Model\Response\GetTagsResponse;

/**
 * Class which defines a Pushwoosh client mock.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class PushwooshMock implements IPushwoosh
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
     * {@inheritDoc}
     */
    public function createMessage(CreateMessageRequest $createMessageRequest)
    {
        return CreateMessageResponse::create(json_decode('{"status_code":200,"status_message":"OK","response": {"Messages":[]}}', true));
    }
    
    /**
     * {@inheritDoc}
     */
    public function deleteMessage(DeleteMessageRequest $deleteMessageRequest)
    {
        return DeleteMessageResponse::create(json_decode('{"status_code":200,"status_message":"OK"}', true));
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
     * {@inheritDoc}
     */
    public function getNearestZone(GetNearestZoneRequest $getNearestZoneRequest)
    {
        return GetNearestZoneResponse::create(
            '{
               "status_code":200,
               "status_message":"OK"
               "response": {  
                  "name":"zone name",
                  "lat":42,
                  "lng":42,
                  "range":100,         
                  "distance":4715784 
               }
            }'
        );
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTags(GetTagsRequest $getTagsRequest)
    {
        return GetTagsResponse::create(
            '{
              "status_code": 200,
              "status_message": "OK"
              "response": {
                "result": {
                  "Language": "fr"
                }
              }
            }'
        );
    }
    
    /**
     * {@inheritDoc}
     */
    public function pushStat(PushStatRequest $pushStatRequest)
    {
        return PushStatResponse::create(json_decode('{"status_code":200,"status_message":"OK"}', true));
    }
    
    /**
     * {@inheritDoc}
     */
    public function registerDevice(RegisterDeviceRequest $registerDeviceRequest)
    {
        return RegisterDeviceResponse::create(json_decode('{"status_code":200,"status_message":"OK","response": null}', true));
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
        return SetBadgeResponse::create(json_decode('{"status_code":200,"status_message":"OK"}', true));
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTags(SetTagsRequest $setTagsRequest)
    {
        return SetTagsResponse::create(json_decode('{"status_code":200,"status_message":"OK","response": null}', true));
    }
    
    /**
     * {@inheritDoc}
     */
    public function unregisterDevice(UnregisterDeviceRequest $unregisterDeviceRequest)
    {
        return UnregisterDeviceResponse::create(json_decode('{"status_code":200,"status_message":"OK"}', true));
    }
}
