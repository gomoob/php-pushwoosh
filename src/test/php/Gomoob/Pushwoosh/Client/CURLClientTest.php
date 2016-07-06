<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2015, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Test case used to test the <code>Pushwoosh</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  CURLClientTest
 */
class CURLClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method for the `pushwooshCall($method, arra $data)` function.
     *
     * @group CURLClientTest.testPushwooshCall
     */
    public function testPushwooshCall()
    {
        $curlClient = new CURLClient();
    
        // First test with a response return which does not correspond to a valid JSON payload
        $curlRequest = $this->createMock(CURLRequest::class);
        $curlRequest->method('exec')->willReturn(false);
        $curlRequest->method('getInfo')->willReturn('CURL_INFO');

        $curlClient->setCurlRequest($curlRequest);

        try {
            $response = $curlClient->pushwooshCall(
                'getTags',
                [
                    'application' => 'XXXXXXXX',
                    'auth' => 'XXXXXXXX',
                    'hwid' => 'XXXXXXXX'
                ]
            );
            
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $ex) {
            $this->assertSame(
                'Bad response encountered while requesting the Pushwoosh web services using CURL !',
                $ex->getMessage()
            );
            
            $data = $ex->getData();
            
            $this->assertCount(1, $data);
            $this->assertTrue(array_key_exists('curl_info', $data));
            $this->assertSame('CURL_INFO', $data['curl_info']);
        }
        
        // Second test with a CURL error encountered
        $curlRequest = $this->createMock(CURLRequest::class);
        $curlRequest->method('exec')->willReturn(
            [
                'status_code' => 400,
                'status_message' => 'Test with valid JSON response but CURL error encountered.',
                'response' => null
            ]
        );
        $curlRequest->method('error')->willReturn('CURL_ERROR');
        $curlRequest->method('getInfo')->willReturn('CURL_INFO');

        $curlClient->setCurlRequest($curlRequest);
        
        try {
            $response = $curlClient->pushwooshCall(
                'getTags',
                [
                    'application' => 'XXXXXXXX',
                    'auth' => 'XXXXXXXX',
                    'hwid' => 'XXXXXXXX'
                ]
            );
                
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $ex) {
            $this->assertSame(
                'CURL error encountered while requesting the Pushwoosh web services using CURL !',
                $ex->getMessage()
            );
        
            $data = $ex->getData();
        
            $this->assertCount(2, $data);
            $this->assertTrue(array_key_exists('curl_error', $data));
            $this->assertTrue(array_key_exists('curl_info', $data));
            $this->assertSame('CURL_ERROR', $data['curl_error']);
            $this->assertSame('CURL_INFO', $data['curl_info']);
        }
    }
}
