<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2015, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\ICURLClient;
use Gomoob\Pushwoosh\Curl\CurlRequest;
use Gomoob\Pushwoosh\Exception\PushwooshException;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>Pushwoosh</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  CURLClientTest
 */
class CURLClientTest extends TestCase
{
    /**
     * Test method for the `getApiUrl()` and `setApiUrl($apiUrl)` functions.
     */
    public function testGetSetApiUrl()
    {
        $curlClient = new CURLClient();
        $this->assertSame(ICURLClient::DEFAULT_API_URL, $curlClient->getApiUrl());
        $curlClient->setApiUrl('https://your-company.pushwoosh.com');
        $this->assertSame('https://your-company.pushwoosh.com', $curlClient->getApiUrl());
    }

    /**
     * Test method for the `setAdditionalCurlOpt($option, $value)` function.
     */
    public function testGetSetAdditionalCurlOpt()
    {
        $curlClient = new CURLClient();

        // Initially no additional CURL options are defined
        $this->assertEmpty($curlClient->getAdditionalCurlOpts());

        // Tests with not allowed CURL options
        try {
            $curlClient->setAdditionalCurlOpt(CURLOPT_ENCODING, '');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_ENCODING\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpt(CURLOPT_HTTPHEADER, '');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_HTTPHEADER\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpt(CURLOPT_POST, '');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_POST\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpt(CURLOPT_POSTFIELDS, '');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_POSTFIELDS\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpt(CURLOPT_RETURNTRANSFER, '');
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_RETURNTRANSFER\' cannot be set as an additional CURL option because its ' .
                'internally used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }

        // Test with allowed additional CURL options
        $curlClient->setAdditionalCurlOpt(CURLOPT_CONNECTTIMEOUT, 5);
        $curlClient->setAdditionalCurlOpt(CURLOPT_TIMEOUT, 15);
        $this->assertCount(2, $curlClient->getAdditionalCurlOpts());
        $this->assertSame(5, $curlClient->getAdditionalCurlOpts()[CURLOPT_CONNECTTIMEOUT]);
        $this->assertSame(15, $curlClient->getAdditionalCurlOpts()[CURLOPT_TIMEOUT]);
    }

    /**
     * Test method for the `getAdditioanlCurlOpts()` and `setAdditionalCurlOpts(array $additionalCurlOpts)` functions.
     */
    public function testGetSetAdditionalCurlOpts()
    {
        $curlClient = new CURLClient();

        // Initially no additional CURL options are defined
        $this->assertEmpty($curlClient->getAdditionalCurlOpts());

        // Tests with not allowed CURL options
        try {
            $curlClient->setAdditionalCurlOpts([CURLOPT_ENCODING => '']);
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_ENCODING\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpts([CURLOPT_HTTPHEADER => '']);
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_HTTPHEADER\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpts([CURLOPT_POST => '']);
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_POST\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpts([CURLOPT_POSTFIELDS => '']);
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_POSTFIELDS\' cannot be set as an additional CURL option because its internally ' .
                'used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }
        try {
            $curlClient->setAdditionalCurlOpts([CURLOPT_RETURNTRANSFER => '']);
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame(
                'The option \'CURLOPT_RETURNTRANSFER\' cannot be set as an additional CURL option because its ' .
                'internally used by the CURL client and modifying it would break valid Pushwoosh Web Service calls !',
                $pex->getMessage()
            );
        }

        // Test with allowed additional CURL options
        $curlClient->setAdditionalCurlOpts(
            [
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT => 15
            ]
        );
        $this->assertCount(2, $curlClient->getAdditionalCurlOpts());
        $this->assertSame(5, $curlClient->getAdditionalCurlOpts()[CURLOPT_CONNECTTIMEOUT]);
        $this->assertSame(15, $curlClient->getAdditionalCurlOpts()[CURLOPT_TIMEOUT]);
    }

    /**
     * Test method for the `getCurlRequest()` and `setCurlRequest($curlRequest)` functions.
     */
    public function testGetSetCurlRequest()
    {
        $curlRequest = $this->createMock(CurlRequest::class);

        $curlClient = new CURLClient();
        $this->assertNotNull($curlClient->getCurlRequest());
        $curlClient->setCurlRequest($curlRequest);
        $this->assertSame($curlRequest, $curlClient->getCurlRequest());
    }

    /**
     * Test method for the `pushwooshCall($method, arra $data)` function.
     *
     * @group CURLClientTest.testPushwooshCall
     */
    public function testPushwooshCall()
    {
        $curlClient = new CURLClient();

        // First test with a response return which does not correspond to a valid JSON payload
        $curlRequest = $this->createMock(CurlRequest::class);
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

            $this->assertCount(2, $data);
            $this->assertTrue(array_key_exists('curl_info', $data));
            $this->assertTrue(array_key_exists('response', $data));
            $this->assertSame('CURL_INFO', $data['curl_info']);
            $this->assertFalse($data['response']);
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

            $this->assertCount(3, $data);
            $this->assertTrue(array_key_exists('curl_error', $data));
            $this->assertTrue(array_key_exists('curl_info', $data));
            $this->assertTrue(array_key_exists('response', $data));
            $this->assertSame('CURL_ERROR', $data['curl_error']);
            $this->assertSame('CURL_INFO', $data['curl_info']);
            $this->assertSame(
                [
                    'status_code' => 400,
                    'status_message' => 'Test with valid JSON response but CURL error encountered.',
                    'response' => null
                ],
                $data['response']
            );
        }
    }
}
