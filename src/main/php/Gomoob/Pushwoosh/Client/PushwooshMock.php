<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\IPushwoosh;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

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
    public function deleteMessage()
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
    public function pushStat()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function registerDevice()
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
    public function setBadge()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setTags()
    {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function unregisterDevice()
    {
        // TODO: Auto-generated method stub

    }
}
