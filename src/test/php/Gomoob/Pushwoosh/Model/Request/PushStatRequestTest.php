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
 * @group  PushStateRequestTest
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
        $this->assertSame('APPLICATION', $pushStatRequest->getApplication());
    }

    /**
     * Test method for the <tt>getHash()</tt> and <tt>setHash($hash)</tt> functions.
     */
    public function testGetSetHash()
    {
        $pushStatRequest = new PushStatRequest();
        $this->assertNull($pushStatRequest->getHash());
        $pushStatRequest->setHash('hash');
        $this->assertSame('hash', $pushStatRequest->getHash());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $pushStatRequest = new PushStatRequest();
        $this->assertNull($pushStatRequest->getHwid());
        $pushStatRequest->setHwid('HWID');
        $this->assertSame('HWID', $pushStatRequest->getHwid());
    }

    /**
     * Test method for the <tt>jsonSerialize()</tt> function.
     */
    public function testJsonSerialize()
    {
        $pushStatRequest = new PushStatRequest();

        // Test without the 'application' parameter set
        try {
            $pushStatRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'application\' property is not set !', $pe->getMessage());
        }

        // Test without the 'hash' parameter set
        $pushStatRequest->setApplication('APPLICATION');
        try {
            $pushStatRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'hash\' property is not set !', $pe->getMessage());
        }

        // Test without the 'hwid' parameter set
        $pushStatRequest->setHash('hash');
        try {
            $pushStatRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'hwid\' property is not set !', $pe->getMessage());
        }

        // Test with valid values
        $pushStatRequest->setHwid('HWID');
        $array = $pushStatRequest->jsonSerialize();
        $this->assertSame('APPLICATION', $array['application']);
        $this->assertSame('hash', $array['hash']);
        $this->assertSame('HWID', $array['hwid']);
    }
}
