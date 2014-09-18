<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>CreateMessageResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group CreateMessageResponseTest
 */
class CreateMessageResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a successful response
        $createMessageResponse = CreateMessageResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK',
                'response' => array(
                    'Messages' => array(
                        'notificationCode0',
                        'notificationCode1',
                        'notificationCode2'
                    )
                )
            )
        );

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNotNull($createMessageResponseResponse);
        $messages = $createMessageResponseResponse->getMessages();
        $this->assertCount(3, $messages);
        $this->assertTrue(in_array('notificationCode0', $messages));
        $this->assertTrue(in_array('notificationCode1', $messages));
        $this->assertTrue(in_array('notificationCode2', $messages));

        $this->assertTrue($createMessageResponse->isOk());
        $this->assertEquals(200, $createMessageResponse->getStatusCode());
        $this->assertEquals('OK', $createMessageResponse->getStatusMessage());

        // Test with an error response
        $createMessageResponse = CreateMessageResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO'
            )
        );

        $createMessageResponseResponse = $createMessageResponse->getResponse();
        $this->assertNull($createMessageResponseResponse);
        $this->assertFalse($createMessageResponse->isOk());
        $this->assertEquals(400, $createMessageResponse->getStatusCode());
        $this->assertEquals('KO', $createMessageResponse->getStatusMessage());

    }
}
