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
 * @group  GetNearestZoneResponseTest
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
            [
                'status_code' => 200,
                'status_message' => 'OK',
                'response' => [
                    'name' => 'zoneName',
                    'lat' => 42,
                    'lng' => 13,
                    'range' => 100,
                    'distance' => 4715784
                ]
            ]
        );

        $this->assertTrue($getNearestZoneResponse->isOk());
        $this->assertSame(200, $getNearestZoneResponse->getStatusCode());
        $this->assertSame('OK', $getNearestZoneResponse->getStatusMessage());

        $getNearestZoneResponseResponse = $getNearestZoneResponse->getResponse();
        $this->assertNotNull($getNearestZoneResponseResponse);
        $this->assertSame('zoneName', $getNearestZoneResponseResponse->getName());
        $this->assertSame(42, $getNearestZoneResponseResponse->getLat());
        $this->assertSame(13, $getNearestZoneResponseResponse->getLng());
        $this->assertSame(100, $getNearestZoneResponseResponse->getRange());
        $this->assertSame(4715784, $getNearestZoneResponseResponse->getDistance());

        // Test with an error response without any 'response' field
        $getNearestZoneResponse = GetNearestZoneResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $this->assertFalse($getNearestZoneResponse->isOk());
        $this->assertSame(400, $getNearestZoneResponse->getStatusCode());
        $this->assertSame('KO', $getNearestZoneResponse->getStatusMessage());

        // Test with an error response with a null 'response' field
        // Fix https://github.com/gomoob/php-pushwoosh/issues/13
        $getNearestZoneResponse = GetNearestZoneResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO',
                'response' => null
            ]
        );
        
        $this->assertFalse($getNearestZoneResponse->isOk());
        $this->assertSame(400, $getNearestZoneResponse->getStatusCode());
        $this->assertSame('KO', $getNearestZoneResponse->getStatusMessage());
    }
}
