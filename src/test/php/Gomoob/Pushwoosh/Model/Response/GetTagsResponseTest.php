<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Test case used to test the <code>GetTagsResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group GetTagsResponseTest
 */
class GetTagsResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create(array $json)</tt> function.
	 */
    public function testCreate()
    {
        // Test with a successful response
        $getTagsResponse = GetTagsResponse::create(
            array(
                'status_code' => 200,
                'status_message' => 'OK',
                'response' => array(
                    'result' => array(
                        'tag0' => 'tag0Value',
                        'tag1' => 'tag1Value',
                        'tag2' => 'tag2Value'
                    )
                )
            )
        );

        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNotNull($getTagsResponseResponse);

        $result = $getTagsResponseResponse->getResult();
        $this->assertCount(3, $result);
        $this->assertEquals('tag0Value', $result['tag0']);
        $this->assertEquals('tag1Value', $result['tag1']);
        $this->assertEquals('tag2Value', $result['tag2']);

        $tags = $getTagsResponseResponse->getTags();
        $this->assertCount(3, $tags);
        $this->assertEquals('tag0Value', $tags['tag0']);
        $this->assertEquals('tag1Value', $tags['tag1']);
        $this->assertEquals('tag2Value', $tags['tag2']);

        $this->assertTrue($getTagsResponseResponse->hasTag('tag0'));
        $this->assertTrue($getTagsResponseResponse->hasTag('tag1'));
        $this->assertTrue($getTagsResponseResponse->hasTag('tag2'));

        $this->assertTrue($getTagsResponse->isOk());
        $this->assertEquals(200, $getTagsResponse->getStatusCode());
        $this->assertEquals('OK', $getTagsResponse->getStatusMessage());

        // Test with an error response
        $getTagsResponse = GetTagsResponse::create(
            array(
                'status_code' => 400,
                'status_message' => 'KO'
            )
        );

        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNull($getTagsResponseResponse);
        $this->assertFalse($getTagsResponse->isOk());
        $this->assertEquals(400, $getTagsResponse->getStatusCode());
        $this->assertEquals('KO', $getTagsResponse->getStatusMessage());

    }
}
