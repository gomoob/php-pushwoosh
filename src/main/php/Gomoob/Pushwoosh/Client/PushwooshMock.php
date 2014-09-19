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

/**
 * Class which defines a Pushwoosh client mock.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class PushwooshMock implements IPushwoosh
{
    /**
     * {@inheritDoc}
     */
    public function createMessage(CreateMessageRequest $createMessageRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function deleteMessage(DeleteMessageRequest $deleteMessageRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function getApplication()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function getApplicationsGroup()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function getAuth()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function getNearestZone()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function getTags(GetTagsRequest $getTagsRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function pushStat(PushStatRequest $pushStatRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function registerDevice(RegisterDeviceRequest $registerDeviceRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setApplication($application)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setApplicationsGroup($applicationsGroup)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setAuth($auth)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setBadge(SetBadgeRequest $setBadgeRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setTags(SetTagsRequest $setTagsRequest)
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function unregisterDevice(UnregisterDeviceRequest $unregisterDeviceRequest)
    {
        // TODO: Auto-generated method stub

    }
}
