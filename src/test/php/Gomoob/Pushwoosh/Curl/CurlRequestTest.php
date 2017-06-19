<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2017, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Curl;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the `CurlRequest` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  CurlRequestTest
 */
class CurlRequestTest extends TestCase
{
    /**
     * Test method for the `__construct($url = null)` function.
     *
     * @group CurlRequestTest.testConstruct
     */
    public function testConstruct()
    {
        // Test with no URL provided
        $curlRequest = new CurlRequest();
        $this->assertNotNull($curlRequest);

        // Test with a valid URL provided
        $curlRequest = new CurlRequest('https://www.gomoob.com');
        $this->assertNotNull($curlRequest);

        // Test with a bad URL provided
        try {
            new CurlRequest('bad');
            $this->fail('Must have thrown an Exception !');
        } catch (\Exception $ex) {
            $this->assertSame('Invalid URL provided \'bad\' !', $ex->getMessage());
        }
    }

    /**
     * Test method for the `close()` function.
     *
     * @group CurlRequestTest.testClose
     */
    public function testClose()
    {
        // Test with a CURL request without handle
        $curlRequest = new CurlRequest();

        try {
            $curlRequest->close();
            $this->fail('Must have thrown an Exception !');
        } catch (\Exception $ex) {
            $this->assertSame('No CURL handle found, did you call init ?', $ex->getMessage());
        }

        // Test with a CURL request having a handle
        $curlRequest = new CurlRequest('https://www.gomoob.com');
        $curlRequest->close();
    }

    /**
     * Test method for the `error()` function.
     *
     * @group CurlRequestTest.testError
     */
    public function testError()
    {
        // Test with a CURL request without handle
        $curlRequest = new CurlRequest();

        try {
            $curlRequest->error();
            $this->fail('Must have thrown an Exception !');
        } catch (\Exception $ex) {
            $this->assertSame('No CURL handle found, did you call init ?', $ex->getMessage());
        }

        // Test with a CURL request having a handle
        $curlRequest = new CurlRequest('https://www.gomoob.com');
        $error = $curlRequest->error();
        $this->assertSame('', $error);
    }

    /**
     * Test method for the `exec()` function.
     *
     * @group CurlRequestTest.testExec
     */
    public function testExec()
    {
        // Test with a CURL request without handle
        $curlRequest = new CurlRequest();

        try {
            $curlRequest->exec();
            $this->fail('Must have thrown an Exception !');
        } catch (\Exception $ex) {
            $this->assertSame('No CURL handle found, did you call init ?', $ex->getMessage());
        }

        // Test with a CURL request having a handle
        $curlRequest = new CurlRequest('https://www.gomoob.com');

        // see: http://curl.haxx.se/docs/sslcerts.html
        $curlRequest->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curlRequest->setOpt(CURLOPT_CAINFO, __DIR__ . '/../../../../../main/resources/cacert.pem');
        $curlRequest->setOpt(CURLOPT_SSL_VERIFYHOST, 2);
        $curlRequest->setOpt(CURLOPT_SSL_VERIFYPEER, true);

        $result = $curlRequest->exec();
        $this->assertRegexp('/GoMoob/', $result);
    }

    /**
     * Test method for the `init($url = null)` function.
     *
     * @group CurlRequestTest.testInit
     */
    public function testInit()
    {
        // Test with no URL provided and no CURL handle initilized after construct
        $curlRequest = new CurlRequest();
        $curlRequest->init();

        // Test with no URL provided and a CURL handle initilized after construct
        $curlRequest = new CurlRequest('https://www.gomoob.com');
        $curlRequest->init();

        // Test with a bad URL provided
        try {
            $curlRequest->init('bad');
            $this->fail('Must have thrown an Exception !');
        } catch (\Exception $ex) {
            $this->assertSame('Invalid URL provided \'bad\' !', $ex->getMessage());
        }

        // Test with a good URL provided
        $curlRequest->init('https://www.gomoob.com');
    }

    /**
     * Test method for the `getInfo()` function.
     *
     * @group CurlRequestTest.testGetInfo
     */
    public function testGetInfo()
    {
        // Test with a CURL request without handle
        $curlRequest = new CurlRequest();

        try {
            $curlRequest->getInfo();
            $this->fail('Must have thrown an Exception !');
        } catch (\Exception $ex) {
            $this->assertSame('No CURL handle found, did you call init ?', $ex->getMessage());
        }

        // Test with no parameter provided
        $curlRequest = new CurlRequest('https://www.gomoob.com');

        // see: http://curl.haxx.se/docs/sslcerts.html
        $curlRequest->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curlRequest->setOpt(CURLOPT_CAINFO, __DIR__ . '/../../../../../main/resources/cacert.pem');
        $curlRequest->setOpt(CURLOPT_SSL_VERIFYHOST, 2);
        $curlRequest->setOpt(CURLOPT_SSL_VERIFYPEER, true);

        $result = $curlRequest->getInfo();
        $this->assertSame('https://www.gomoob.com', $result);

        // Test with a parameter
        $result = $curlRequest->getInfo(CURLINFO_LOCAL_PORT);
        $this->assertSame(0, $result);
    }
}
