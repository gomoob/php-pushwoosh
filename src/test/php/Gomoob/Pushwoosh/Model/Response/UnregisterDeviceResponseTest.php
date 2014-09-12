<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>UnregisterDeviceResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group UnregisterDeviceResponseTest
 */
class UnregisterDeviceResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        $unregisterDeviceResponse = UnregisterDeviceResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK'
            )
        );

        $this->assertTrue($unregisterDeviceResponse->isOk());
        $this->assertEquals(200, $unregisterDeviceResponse->getStatusCode());
        $this->assertEquals('OK', $unregisterDeviceResponse->getStatusMessage());
    }
}
