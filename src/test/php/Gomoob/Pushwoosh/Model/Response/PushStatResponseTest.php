<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>PushStatResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group PushStatResponseTest
 */
class PushStatResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a success response
        $pushStatResponse = PushStatResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK'
            )
        );

        $this->assertTrue($pushStatResponse->isOk());
        $this->assertEquals(200, $pushStatResponse->getStatusCode());
        $this->assertEquals('OK', $pushStatResponse->getStatusMessage());

        // Test with an error response
        $pushStatResponse = PushStatResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO'
            )
        );

        $this->assertFalse($pushStatResponse->isOk());
        $this->assertEquals(400, $pushStatResponse->getStatusCode());
        $this->assertEquals('KO', $pushStatResponse->getStatusMessage());
    }
}
