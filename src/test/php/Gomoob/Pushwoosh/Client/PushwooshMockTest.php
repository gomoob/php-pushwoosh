<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2017, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Request\CreateTargetedMessageRequest;
use Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest;

use PHPUnit\Framework\TestCase;
use Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest;
use Gomoob\Pushwoosh\Model\Request\GetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\PushStatRequest;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\SetBadgeRequest;
use Gomoob\Pushwoosh\Model\Request\SetTagsRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;

/**
 * Test case used to test the `PushwooshMock` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  PushwooshMockTest
 */
class PushwooshMockTest extends TestCase
{
    /**
     * Test method for the `clear()` function.
     *
     * @group PushwooshMockTest.testClear
     */
    public function testClear()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Execute requests
        $pushwooshMock->createMessage(CreateMessageRequest::create());
        $pushwooshMock->createMessage(CreateMessageRequest::create());
        $pushwooshMock->createMessage(CreateMessageRequest::create());
        $pushwooshMock->createMessage(CreateMessageRequest::create());
        $pushwooshMock->createMessage(CreateMessageRequest::create());

        // 5 requests have been send
        $this->assertCount(5, $pushwooshMock->getPushwooshRequests());

        // Clear and test
        $pushwooshMock->clear();
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());
    }

    /**
     * Test method for the `createMessage(CreateMessageRequest $createMessageRequest)` function.
     *
     * @group PushwooshMockTest.testCreateMessage
     */
    public function testCreateMessage()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $createMessageRequest = CreateMessageRequest::create();
        $createMessageResponse = $pushwooshMock->createMessage($createMessageRequest);

        $this->assertNotNull($createMessageResponse);
        $this->assertSame(200, $createMessageResponse->getStatusCode());
        $this->assertSame('OK', $createMessageResponse->getStatusMessage());
        $this->assertTrue($createMessageResponse->isOk());

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNotNull($createMessageResponseResponse);
        $this->assertCount(0, $createMessageResponseResponse->getMessages());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($createMessageRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `createTargetedMessage(CreateTargetedMessageRequest $createTargetedMessageRequest)` function.
     *
     * @group PushwooshMockTest.testCreateTargetedMessage
     */
    public function testCreateTargetedMessage()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $createTargetedMessageResponse = $pushwooshMock->createTargetedMessage(CreateTargetedMessageRequest::create());

        $this->assertNotNull($createTargetedMessageResponse);
        $this->assertSame(200, $createTargetedMessageResponse->getStatusCode());
        $this->assertSame('OK', $createTargetedMessageResponse->getStatusMessage());
        $this->assertTrue($createTargetedMessageResponse->isOk());

        $createTargetedMessageResponseResponse = $createTargetedMessageResponse->getResponse();
        $this->assertNotNull($createTargetedMessageResponseResponse);
    }

    /**
     * Test method for the `deleteMessage(DeleteMessageRequest $deleteMessageRequest)` function.
     *
     * @group PushwooshMockTest.testDeleteMessage
     */
    public function testDeleteMessage()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $deleteMessageRequest = DeleteMessageRequest::create();
        $deleteMessageResponse = $pushwooshMock->deleteMessage($deleteMessageRequest);

        $this->assertNotNull($deleteMessageResponse);
        $this->assertSame(200, $deleteMessageResponse->getStatusCode());
        $this->assertSame('OK', $deleteMessageResponse->getStatusMessage());
        $this->assertTrue($deleteMessageResponse->isOk());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($deleteMessageRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `getNearestZone(GetNearestZoneRequest $getNearestZoneRequest)` function.
     *
     * @group PushwooshMockTest.testGetNearestZone
     */
    public function testGetNearestZone()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $getNearestZoneRequest = GetNearestZoneRequest::create()->setLat(43)->setLng(52);
        $getNearestZoneResponse = $pushwooshMock->getNearestZone($getNearestZoneRequest);

        $this->assertNotNull($getNearestZoneResponse);
        $this->assertSame(200, $getNearestZoneResponse->getStatusCode());
        $this->assertSame('OK', $getNearestZoneResponse->getStatusMessage());
        $this->assertTrue($getNearestZoneResponse->isOk());

        $getNearestZoneResponseResponse = $getNearestZoneResponse->getResponse();
        $this->assertNotNull($getNearestZoneResponseResponse);
        $this->assertSame(4715784, $getNearestZoneResponseResponse->getDistance());
        $this->assertSame(42, $getNearestZoneResponseResponse->getLat());
        $this->assertSame(42, $getNearestZoneResponseResponse->getLng());
        $this->assertSame('zone name', $getNearestZoneResponseResponse->getName());
        $this->assertSame(100, $getNearestZoneResponseResponse->getRange());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($getNearestZoneRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `getApplication()` and `setApplication($application)` functions.
     */
    public function testGetSetApplication()
    {
        $pushwoosh = new PushwooshMock();
        $this->assertNull($pushwoosh->getApplication());
        $this->assertSame($pushwoosh, $pushwoosh->setApplication('APPLICATION'));
        $this->assertSame('APPLICATION', $pushwoosh->getApplication());
    }

    /**
     * Test method for the `getApplicationsGroup()` and `setApplicationsGroup($applicationsGroup)`
     * functions.
     */
    public function testGetSetApplicationsGroup()
    {
        $pushwoosh = new PushwooshMock();
        $this->assertNull($pushwoosh->getApplicationsGroup());
        $this->assertSame($pushwoosh, $pushwoosh->setApplicationsGroup('APPLICATIONS_GROUP'));
        $this->assertSame('APPLICATIONS_GROUP', $pushwoosh->getApplicationsGroup());
    }

    /**
     * Test method for the `getAuth()` and `setAuth($auth)` functions.
     */
    public function testGetSetAuth()
    {
        $pushwoosh = new PushwooshMock();
        $this->assertNull($pushwoosh->getAuth());
        $this->assertSame($pushwoosh, $pushwoosh->setAuth('AUTH'));
        $this->assertSame('AUTH', $pushwoosh->getAuth());
    }

    /**
     * Test method for the `getTags(GetTagsRequest $getTagsRequest)` function.
     *
     * @group PushwooshMockTest.testGetTags
     */
    public function testGetTags()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $getTagsRequest = GetTagsRequest::create();
        $getTagsResponse = $pushwooshMock->getTags($getTagsRequest);

        $this->assertNotNull($getTagsResponse);
        $this->assertSame(200, $getTagsResponse->getStatusCode());
        $this->assertSame('OK', $getTagsResponse->getStatusMessage());
        $this->assertTrue($getTagsResponse->isOk());

        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNotNull($getTagsResponseResponse);
        $this->assertCount(1, $getTagsResponseResponse->getResult());
        $this->assertArrayHasKey('Language', $getTagsResponseResponse->getResult());
        $this->assertSame('fr', $getTagsResponseResponse->getResult()['Language']);

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($getTagsRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `pushStat(PushStatRequest $pushStatRequest)` function.
     *
     * @group PushwooshMockTest.testPushStat
     */
    public function testPushStat()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $pushStatRequest = PushStatRequest::create();
        $pushStatResponse = $pushwooshMock->pushStat($pushStatRequest);

        $this->assertNotNull($pushStatResponse);
        $this->assertSame(200, $pushStatResponse->getStatusCode());
        $this->assertSame('OK', $pushStatResponse->getStatusMessage());
        $this->assertTrue($pushStatResponse->isOk());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($pushStatRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `registerDevice(RegisterDeviceRequest $registerDeviceRequest)` function.
     *
     * @group PushwooshMockTest.testRegisterDevice
     */
    public function testRegisterDevice()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $registerDeviceRequest = RegisterDeviceRequest::create();
        $registerDeviceResponse = $pushwooshMock->registerDevice($registerDeviceRequest);

        $this->assertNotNull($registerDeviceResponse);
        $this->assertSame(200, $registerDeviceResponse->getStatusCode());
        $this->assertSame('OK', $registerDeviceResponse->getStatusMessage());
        $this->assertTrue($registerDeviceResponse->isOk());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($registerDeviceRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `setBadge(SetBadgeRequest $setBadgeRequest)` function.
     *
     * @group PushwooshMockTest.testSetBadge
     */
    public function testSetBadge()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $setBadgeRequest = SetBadgeRequest::create();
        $setBadgeResponse = $pushwooshMock->setBadge($setBadgeRequest);

        $this->assertNotNull($setBadgeResponse);
        $this->assertSame(200, $setBadgeResponse->getStatusCode());
        $this->assertSame('OK', $setBadgeResponse->getStatusMessage());
        $this->assertTrue($setBadgeResponse->isOk());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($setBadgeRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `setTags(SetTagsRequest $setTagsRequest)` function.
     *
     * @group PushwooshMockTest.testSetTags
     */
    public function testSetTags()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $setTagsRequest = SetTagsRequest::create();
        $setTagsResponse = $pushwooshMock->setTags($setTagsRequest);

        $this->assertNotNull($setTagsResponse);
        $this->assertSame(200, $setTagsResponse->getStatusCode());
        $this->assertSame('OK', $setTagsResponse->getStatusMessage());
        $this->assertTrue($setTagsResponse->isOk());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($setTagsRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }

    /**
     * Test method for the `unregisterDevice(UnregisterDeviceRequest $unregisterDeviceRequest)` function.
     *
     * @group PushwooshMockTest.testUnregisterDevice
     */
    public function testUnregisterDevice()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $unregisterDeviceRequest = UnregisterDeviceRequest::create();
        $unregisterDeviceResponse = $pushwooshMock->unregisterDevice($unregisterDeviceRequest);

        $this->assertNotNull($unregisterDeviceResponse);
        $this->assertSame(200, $unregisterDeviceResponse->getStatusCode());
        $this->assertSame('OK', $unregisterDeviceResponse->getStatusMessage());
        $this->assertTrue($unregisterDeviceResponse->isOk());

        // One more requests has been send
        $this->assertCount(1, $pushwooshMock->getPushwooshRequests());
        $this->assertSame($unregisterDeviceRequest, $pushwooshMock->getPushwooshRequests()[0]);
    }
}
