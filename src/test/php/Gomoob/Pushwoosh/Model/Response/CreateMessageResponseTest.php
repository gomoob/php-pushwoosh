<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>CreateMessageResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  CreateMessageResponseTest
 */
class CreateMessageResponseTest extends TestCase
{
    /**
     * Test method for the <tt>create(array $json)</tt> function.
     */
    public function testCreate()
    {
        $responseMock = [
            'status_code' => 200,
            'status_message' => 'OK',
            'response' => [
                'Messages' => [
                    'notificationCode0',
                    'notificationCode1',
                    'notificationCode2'
                ],
                'TrackingCodes' => [
                    'T-0000-00000000-00000000',
                    'T-0000-00000000-00000001',
                    'T-0000-00000000-00000002'
                ],
            ],
        ];

        // Test with a successful response
        $createMessageResponse = CreateMessageResponse::create($responseMock);

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNotNull($createMessageResponseResponse);
        $messages = $createMessageResponseResponse->getMessages();
        $this->assertCount(3, $messages);
        $this->assertContains('notificationCode0', $messages);
        $this->assertContains('notificationCode1', $messages);
        $this->assertContains('notificationCode2', $messages);
        $trackingCodes = $createMessageResponseResponse->getTrackingCodes();
        $this->assertCount(3, $trackingCodes);
        $this->assertContains('T-0000-00000000-00000000', $trackingCodes);
        $this->assertContains('T-0000-00000000-00000001', $trackingCodes);
        $this->assertContains('T-0000-00000000-00000002', $trackingCodes);

        $this->assertEquals($createMessageResponse->getRawResponse(), $responseMock);

        $this->assertTrue($createMessageResponse->isOk());
        $this->assertSame(200, $createMessageResponse->getStatusCode());
        $this->assertSame('OK', $createMessageResponse->getStatusMessage());

        // Test with an error response without any 'response' field
        $createMessageResponse = CreateMessageResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNull($createMessageResponseResponse);
        $this->assertFalse($createMessageResponse->isOk());
        $this->assertSame(400, $createMessageResponse->getStatusCode());
        $this->assertSame('KO', $createMessageResponse->getStatusMessage());

        // Test with an error response with a null 'response' field
        // Fix https://github.com/gomoob/php-pushwoosh/issues/13
        $createMessageResponse = CreateMessageResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO',
                'response' => null
            ]
        );

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNull($createMessageResponseResponse);
        $this->assertFalse($createMessageResponse->isOk());
        $this->assertSame(400, $createMessageResponse->getStatusCode());
        $this->assertSame('KO', $createMessageResponse->getStatusMessage());
    }
}
