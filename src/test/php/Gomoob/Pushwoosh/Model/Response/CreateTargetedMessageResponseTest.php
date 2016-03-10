<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the `CreateMessageResponse` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  CreateTargetedMessageResponseTest
 */
class CreateTargetedMessageResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method for the <tt>create(array $json)</tt> function.
     */
    public function testCreate()
    {
        // Test with a successful response
        // @see https://community.pushwoosh.com/questions/3203/createtargetedmessage-documentation-improvements
        $createTargetedMessageResponse = CreateTargetedMessageResponse::create(
            [
                'status_code' => 200,
                'status_message' => 'OK',
                'response' => [
                    'messageCode' => 'XXXX-XXXXXXXX-XXXXXXXX'
                ]
            ]
        );

        $createTargetedMessageResponseResponse = $createTargetedMessageResponse->getResponse();
        $this->assertNotNull($createTargetedMessageResponseResponse);
        $this->assertSame('XXXX-XXXXXXXX-XXXXXXXX', $createTargetedMessageResponseResponse->getMessageCode());

        $this->assertTrue($createTargetedMessageResponse->isOk());
        $this->assertSame(200, $createTargetedMessageResponse->getStatusCode());
        $this->assertSame('OK', $createTargetedMessageResponse->getStatusMessage());

        // Test with an error response without any 'response' field
        $createTargetedMessageResponse = CreateMessageResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $createTargetedMessageResponseResponse = $createTargetedMessageResponse->getResponse();
        $this->assertNull($createTargetedMessageResponseResponse);
        $this->assertFalse($createTargetedMessageResponse->isOk());
        $this->assertSame(400, $createTargetedMessageResponse->getStatusCode());
        $this->assertSame('KO', $createTargetedMessageResponse->getStatusMessage());

        // Test with an error response with a null 'response' field
        // Fix https://github.com/gomoob/php-pushwoosh/issues/13
        $createTargetedMessageResponse = CreateTargetedMessageResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO',
                'response' => null
            ]
        );
        
        $createTargetedMessageResponseResponse = $createTargetedMessageResponse->getResponse();
        $this->assertNull($createTargetedMessageResponseResponse);
        $this->assertFalse($createTargetedMessageResponse->isOk());
        $this->assertSame(400, $createTargetedMessageResponse->getStatusCode());
        $this->assertSame('KO', $createTargetedMessageResponse->getStatusMessage());
    }
}
