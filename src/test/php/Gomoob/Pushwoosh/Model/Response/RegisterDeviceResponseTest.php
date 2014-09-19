<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>RegisterDeviceResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group RegisterDeviceResponseTest
 */
class RegisterDeviceResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a success response
        $registerDeviceResponse = RegisterDeviceResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK'
            )
        );

        $this->assertTrue($registerDeviceResponse->isOk());
        $this->assertEquals(200, $registerDeviceResponse->getStatusCode());
        $this->assertEquals('OK', $registerDeviceResponse->getStatusMessage());

        // Test with an error response
        $registerDeviceResponse = RegisterDeviceResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO'
            )
        );

        $this->assertFalse($registerDeviceResponse->isOk());
        $this->assertEquals(400, $registerDeviceResponse->getStatusCode());
        $this->assertEquals('KO', $registerDeviceResponse->getStatusMessage());
    }
}
