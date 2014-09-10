<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Test case used to test the <code>DeleteMessageRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group DeleteMessageRequestTest
 */
class DeleteMessageRequestTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals('XXXX', $deleteMessageRequest->getAuth());
    }

    /**
     * Test method for the <tt>getMessage()</tt> and <tt>setMessage($message)</tt> functions.
     */
    public function testGetSetMessage()
    {
        $deleteMessageRequest = new DeleteMessageRequest();
        $this->assertNull($deleteMessageRequest->getMessage());
        $deleteMessageRequest->setMessage('MESSAGE');
        $this->assertEquals('MESSAGE', $deleteMessageRequest->getMessage());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $deleteMessageRequest = new DeleteMessageRequest();

        // Test without the 'auth' parameter set
        try {

            $deleteMessageRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'message' parameter set
        $deleteMessageRequest->setAuth('XXXX');

        try {

            $deleteMessageRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with valid values
        $deleteMessageRequest->setMessage('MESSAGE');

        $array = $deleteMessageRequest->toJSON();
        $this->assertEquals('XXXX', $array['auth']);
        $this->assertEquals('MESSAGE', $array['message']);

    }
}
