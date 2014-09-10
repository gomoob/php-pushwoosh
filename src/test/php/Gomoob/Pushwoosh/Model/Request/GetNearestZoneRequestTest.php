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
 * Test case used to test the <code>GetNearestZoneRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group GetNearestZoneRequestTest
 */
class GetNearestZoneRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $getNearestZoneRequest = GetNearestZoneRequest::create();

        $this->assertNotNull($getNearestZoneRequest);

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $getNearestZoneRequest = new GetNearestZoneRequest();
        $this->assertNull($getNearestZoneRequest->getApplication());
        $getNearestZoneRequest->setApplication('APPLICATION');
        $this->assertEquals('APPLICATION', $getNearestZoneRequest->getApplication());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $getNearestZoneRequest = new GetNearestZoneRequest();
        $this->assertNull($getNearestZoneRequest->getHwid());
        $getNearestZoneRequest->setHwid('HWID');
        $this->assertEquals('HWID', $getNearestZoneRequest->getHwid());
    }

    /**
     * Test method for the <tt>getLat()</tt> and <tt>setLat($lat)</tt> functions.
     */
    public function testGetSetLat()
    {
        $getNearestZoneRequest = new GetNearestZoneRequest();
        $this->assertNull($getNearestZoneRequest->getLat());
        $getNearestZoneRequest->setLat(10.12345);
        $this->assertEquals(10.12345, $getNearestZoneRequest->getLat());
    }

    /**
     * Test method for the <tt>getLng()</tt> and <tt>setLng($lng)</tt> functions.
     */
    public function testGetSetLng()
    {
        $getNearestZoneRequest = new GetNearestZoneRequest();
        $this->assertNull($getNearestZoneRequest->getLng());
        $getNearestZoneRequest->setLng(28.12345);
        $this->assertEquals(28.12345, $getNearestZoneRequest->getLng());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $getNearestZoneRequest = new GetNearestZoneRequest();

        // Test without the 'application' parameter set
        try {

            $getNearestZoneRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hwid' parameter set
        $getNearestZoneRequest->setApplication('APPLICATION');
        try {

            $getNearestZoneRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'lat' parameter set
        $getNearestZoneRequest->setHwid('HWID');
        try {

            $getNearestZoneRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'lng' parameter set
        $getNearestZoneRequest->setLat(10.12345);
        try {

            $getNearestZoneRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with valid values
        $getNearestZoneRequest->setLng(28.12345);
        $array = $getNearestZoneRequest->toJSON();
        $this->assertEquals('APPLICATION', $array['application']);
        $this->assertEquals('HWID', $array['hwid']);
        $this->assertEquals(10.12345, $array['lat']);
        $this->assertEquals(28.12345, $array['lng']);

    }
}
