<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use PHPUnit\Framework\TestCase;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

/**
 * Test case used to test the `PushwooshMock` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  PushwooshMockTest
 */
class PushwooshMockTest extends TestCase
{
    /**
     * Test method for the `createMessage(CreateMessageRequest $createMessageRequest)` function.
     *
     * @group PushwooshTest.createMessage
     */
    public function testCreateMessage()
    {
        $pushwooshMock = new PushwooshMock();

        // At the beginning no pushwoosh requests have been sent
        $this->assertCount(0, $pushwooshMock->getPushwooshRequests());

        // Test call
        $createMessageResponse = $pushwooshMock->createMessage(CreateMessageRequest::create());

        $this->assertNotNull($createMessageResponse);
        $this->assertSame(200, $createMessageResponse->getStatusCode());
        $this->assertSame('OK', $createMessageResponse->getStatusMessage());
        $this->assertTrue($createMessageResponse->isOk());

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNotNull($createMessageResponseResponse);
        $this->assertCount(0, $createMessageResponseResponse->getMessages());
    }
}
