<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>GetNearestZoneResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group GetNearestZoneResponseTest
 */
class GetNearestZoneResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a success response
        $getNearestZoneResponse = GetNearestZoneResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK',
                'response' => array(
                    'name' => 'zoneName',
                    'lat' => 42,
                    'lng' => 13,
                    'range' => 100,
                    'distance' => 4715784
                )
            )
        );

        $this->assertTrue($getNearestZoneResponse->isOk());
        $this->assertEquals(200, $getNearestZoneResponse->getStatusCode());
        $this->assertEquals('OK', $getNearestZoneResponse->getStatusMessage());

        $getNearestZoneResponseResponse = $getNearestZoneResponse->getResponse();
        $this->assertNotNull($getNearestZoneResponseResponse);
        $this->assertEquals('zoneName', $getNearestZoneResponseResponse->getName());
        $this->assertEquals(42, $getNearestZoneResponseResponse->getLat());
        $this->assertEquals(13, $getNearestZoneResponseResponse->getLng());
        $this->assertEquals(100, $getNearestZoneResponseResponse->getRange());
        $this->assertEquals(4715784, $getNearestZoneResponseResponse->getDistance());

        // Test with an error response
        $getNearestZoneResponse = GetNearestZoneResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO',
            )
        );

        $this->assertFalse($getNearestZoneResponse->isOk());
        $this->assertEquals(400, $getNearestZoneResponse->getStatusCode());
        $this->assertEquals('KO', $getNearestZoneResponse->getStatusMessage());

    }
}
