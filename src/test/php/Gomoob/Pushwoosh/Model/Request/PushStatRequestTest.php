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
 * Test case used to test the <code>PushStatRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group PushStateRequestTest
 */
class PushStatRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $pushStatRequest = PushStatRequest::create();

        $this->assertNotNull($pushStatRequest);

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $pushStatRequest = new PushStatRequest();
        $this->assertNull($pushStatRequest->getApplication());
        $pushStatRequest->setApplication('APPLICATION');
        $this->assertEquals('APPLICATION', $pushStatRequest->getApplication());
    }

    /**
     * Test method for the <tt>getHash()</tt> and <tt>setHash($hash)</tt> functions.
     */
    public function testGetSetHash()
    {
        $pushStatRequest = new PushStatRequest();
        $this->assertNull($pushStatRequest->getHash());
        $pushStatRequest->setHash('hash');
        $this->assertEquals('hash', $pushStatRequest->getHash());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $pushStatRequest = new PushStatRequest();
        $this->assertNull($pushStatRequest->getHwid());
        $pushStatRequest->setHwid('HWID');
        $this->assertEquals('HWID', $pushStatRequest->getHwid());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $pushStatRequest = new PushStatRequest();

        // Test without the 'application' parameter set
        try {

            $pushStatRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hash' parameter set
        $pushStatRequest->setApplication('APPLICATION');
        try {

            $pushStatRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hwid' parameter set
        $pushStatRequest->setHash('hash');
        try {

            $pushStatRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with valid values
        $pushStatRequest->setHwid('HWID');
        $array = $pushStatRequest->toJSON();
        $this->assertEquals('APPLICATION', $array['application']);
        $this->assertEquals('hash', $array['hash']);
        $this->assertEquals('HWID', $array['hwid']);

    }
}
