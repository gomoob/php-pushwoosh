<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>GetTagsResponse</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  GetTagsResponseTest
 */
class GetTagsResponseTest extends TestCase
{
    /**
     * Test method for the <tt>create(array $json)</tt> function.
     */
    public function testCreate()
    {
        // Test with a successful response
        $getTagsResponse = GetTagsResponse::create(
            [
                'status_code' => 200,
                'status_message' => 'OK',
                'response' => [
                    'result' => [
                        'tag0' => 'tag0Value',
                        'tag1' => 'tag1Value',
                        'tag2' => 'tag2Value'
                    ]
                ]
            ]
        );

        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNotNull($getTagsResponseResponse);

        $result = $getTagsResponseResponse->getResult();
        $this->assertCount(3, $result);
        $this->assertSame('tag0Value', $result['tag0']);
        $this->assertSame('tag1Value', $result['tag1']);
        $this->assertSame('tag2Value', $result['tag2']);

        $tags = $getTagsResponseResponse->getTags();
        $this->assertCount(3, $tags);
        $this->assertSame('tag0Value', $tags['tag0']);
        $this->assertSame('tag1Value', $tags['tag1']);
        $this->assertSame('tag2Value', $tags['tag2']);

        $this->assertTrue($getTagsResponseResponse->hasTag('tag0'));
        $this->assertTrue($getTagsResponseResponse->hasTag('tag1'));
        $this->assertTrue($getTagsResponseResponse->hasTag('tag2'));

        $this->assertTrue($getTagsResponse->isOk());
        $this->assertSame(200, $getTagsResponse->getStatusCode());
        $this->assertSame('OK', $getTagsResponse->getStatusMessage());

        // Test with an error response without any 'response' field
        $getTagsResponse = GetTagsResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO'
            ]
        );

        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNull($getTagsResponseResponse);
        $this->assertFalse($getTagsResponse->isOk());
        $this->assertSame(400, $getTagsResponse->getStatusCode());
        $this->assertSame('KO', $getTagsResponse->getStatusMessage());
        
        // Test with an error response with a null 'response' field
        // Fix https://github.com/gomoob/php-pushwoosh/issues/13
        $getTagsResponse = GetTagsResponse::create(
            [
                'status_code' => 400,
                'status_message' => 'KO',
                'response' => null
            ]
        );
        
        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNull($getTagsResponseResponse);
        $this->assertFalse($getTagsResponse->isOk());
        $this->assertSame(400, $getTagsResponse->getStatusCode());
        $this->assertSame('KO', $getTagsResponse->getStatusMessage());
    }
}
