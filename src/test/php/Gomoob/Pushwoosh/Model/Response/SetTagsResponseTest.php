<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>SetTagsResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group SetTagsResponseTest
 */
class SetTagsResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a success response
        $setTagsResponse = SetTagsResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK'
            )
        );

        $this->assertTrue($setTagsResponse->isOk());
        $this->assertEquals(200, $setTagsResponse->getStatusCode());
        $this->assertEquals('OK', $setTagsResponse->getStatusMessage());

        // Test with an error response
        $setTagsResponse = SetTagsResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO'
            )
        );

        $this->assertFalse($setTagsResponse->isOk());
        $this->assertEquals(400, $setTagsResponse->getStatusCode());
        $this->assertEquals('KO', $setTagsResponse->getStatusMessage());
    }
}
