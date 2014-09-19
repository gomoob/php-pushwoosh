<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>SetBadgeResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group SetBadgeResponseTest
 */
class SetBadgeResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a success response
        $setBadgeResponse = SetBadgeResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK'
            )
        );

        $this->assertTrue($setBadgeResponse->isOk());
        $this->assertEquals(200, $setBadgeResponse->getStatusCode());
        $this->assertEquals('OK', $setBadgeResponse->getStatusMessage());

        // Test with an error response
        $setBadgeResponse = SetBadgeResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO'
            )
        );

        $this->assertFalse($setBadgeResponse->isOk());
        $this->assertEquals(400, $setBadgeResponse->getStatusCode());
        $this->assertEquals('KO', $setBadgeResponse->getStatusMessage());
    }
}
