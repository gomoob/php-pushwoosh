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
 * Test case used to test the <code>UnregisterDeviceRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group UnregisterDeviceRequestTest
 */
class UnregisterDeviceRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $unregisterDeviceRequest = UnregisterDeviceRequest::create();

        $this->assertNotNull($unregisterDeviceRequest);

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();
        $this->assertNull($unregisterDeviceRequest->getApplication());
        $unregisterDeviceRequest->setApplication('APPLICATION');
        $this->assertEquals('APPLICATION', $unregisterDeviceRequest->getApplication());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();
        $this->assertNull($unregisterDeviceRequest->getHwid());
        $unregisterDeviceRequest->setHwid('HWID');
        $this->assertEquals('HWID', $unregisterDeviceRequest->getHwid());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $unregisterDeviceRequest = new UnregisterDeviceRequest();

        // Test without the 'application' parameter set
        try {

            $unregisterDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hwid' parameter set
        $unregisterDeviceRequest->setApplication('APPLICATION');
        try {

            $unregisterDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        $unregisterDeviceRequest->setHwid('HWID');

        // Test with valid values
        $array = $unregisterDeviceRequest->toJSON();
        $this->assertEquals('APPLICATION', $unregisterDeviceRequest->getApplication());
        $this->assertEquals('HWID', $unregisterDeviceRequest->getHwid());

    }
}
