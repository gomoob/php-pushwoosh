<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>DeleteMessageRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  DeleteMessageRequestTest
 */
class DeleteMessageRequestTest extends TestCase
{
    /**
     * Test method for the <tt>create()</tt> function.
     */
    public function testCreate()
    {
        $deleteMessageRequest = DeleteMessageRequest::create();

        $this->assertNotNull($deleteMessageRequest);
    }

    /**
     * Test method for the <tt>getAuth()</tt> and <tt>setAuth($auth)</tt> functions.
     */
    public function testGetSetAuth()
    {
        $deleteMessageRequest = new DeleteMessageRequest();
        $this->assertNull($deleteMessageRequest->getAuth());
        $deleteMessageRequest->setAuth('XXXX');
        $this->assertSame('XXXX', $deleteMessageRequest->getAuth());
    }

    /**
     * Test method for the <tt>getMessage()</tt> and <tt>setMessage($message)</tt> functions.
     */
    public function testGetSetMessage()
    {
        $deleteMessageRequest = new DeleteMessageRequest();
        $this->assertNull($deleteMessageRequest->getMessage());
        $deleteMessageRequest->setMessage('MESSAGE');
        $this->assertSame('MESSAGE', $deleteMessageRequest->getMessage());
    }

    /**
     * Test method for the <tt>jsonSerialize()</tt> function.
     */
    public function testJsonSerialize()
    {
        $deleteMessageRequest = new DeleteMessageRequest();

        // Test without the 'auth' parameter set
        try {
            $deleteMessageRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'auth\' property is not set !', $pe->getMessage());
        }

        // Test without the 'message' parameter set
        $deleteMessageRequest->setAuth('XXXX');

        try {
            $deleteMessageRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'message\' property is not set !', $pe->getMessage());
        }

        // Test with valid values
        $deleteMessageRequest->setMessage('MESSAGE');

        $array = $deleteMessageRequest->jsonSerialize();
        $this->assertSame('XXXX', $array['auth']);
        $this->assertSame('MESSAGE', $array['message']);
    }
}
