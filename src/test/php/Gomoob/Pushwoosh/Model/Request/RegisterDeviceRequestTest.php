<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>RegisterDeviceRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  RegisterDeviceRequestTest
 */
class RegisterDeviceRequestTest extends TestCase
{
    /**
     * Test method for the <tt>create()</tt> function.
     */
    public function testCreate()
    {
        $registerDeviceRequest = RegisterDeviceRequest::create();

        $this->assertNotNull($registerDeviceRequest);
    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getApplication());
        $registerDeviceRequest->setApplication('APPLICATION');
        $this->assertSame('APPLICATION', $registerDeviceRequest->getApplication());
    }

    /**
     * Test method for the <tt>getDeviceType()</tt> and <tt>setDeviceType($deviceType)</tt> functions.
     */
    public function testGetSetDeviceType()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getDeviceType());
        $registerDeviceRequest->setDeviceType(1);
        $this->assertSame(1, $registerDeviceRequest->getDeviceType());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getHwid());
        $registerDeviceRequest->setHwid('HWID');
        $this->assertSame('HWID', $registerDeviceRequest->getHwid());
    }

    /**
     * Test method for the <tt>getLanguage()</tt> and <tt>setLanguage($language)</tt> functions.
     */
    public function testGetSetLanguage()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getLanguage());
        $registerDeviceRequest->setLanguage('fr');
        $this->assertSame('fr', $registerDeviceRequest->getLanguage());
    }

    /**
     * Test method for the <tt>getPushToken()</tt> and <tt>setPushToken($pushToken)</tt> functions.
     */
    public function testGetSetPushToken()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getPushToken());
        $registerDeviceRequest->setPushToken('PUSH_TOKEN');
        $this->assertSame('PUSH_TOKEN', $registerDeviceRequest->getPushToken());
    }

    /**
     * Test method for the <tt>getTimezone()</tt> and <tt>setTimezone($timezone)</tt> functions.
     */
    public function testGetSetTimezone()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getTimezone());
        $registerDeviceRequest->setTimezone(3600);
        $this->assertSame(3600, $registerDeviceRequest->getTimezone());
    }

    /**
     * Test method for the <tt>jsonSerialize()</tt> function.
     */
    public function testJsonSerialize()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();

        // Test without the 'application' parameter set
        try {
            $registerDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'application\' property is not set !', $pe->getMessage());
        }

        // Test without the 'deviceType' parameter set
        $registerDeviceRequest->setApplication('APPLICATION');
        try {
            $registerDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'deviceType\' property is not set !', $pe->getMessage());
        }

        // Test with a bad 'deviceType' parameter set (special value 6)
        $registerDeviceRequest->setDeviceType(6);
        try {
            $registerDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'deviceType\' value \'6\' is invalid !', $pe->getMessage());
        }

        // Test with a bad 'deviceType' parameter set
        $registerDeviceRequest->setDeviceType(100);
        try {
            $registerDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'deviceType\' value \'100\' is invalid !', $pe->getMessage());
        }

        // Test without the 'hwid' parameter set
        $registerDeviceRequest->setDeviceType(1);
        try {
            $registerDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'hwid\' property is not set !', $pe->getMessage());
        }

        // Test without the 'pushToken' parameter set
        $registerDeviceRequest->setHwid('HWID');
        try {
            $registerDeviceRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'pushToken\' property is not set !', $pe->getMessage());
        }

        // Test without the 'timezone' parameter set
        $registerDeviceRequest->setPushToken('PUSH_TOKEN');
        $registerDeviceRequest->setTimezone(3600);

        // Test without the 'language' parameter set
        $array = $registerDeviceRequest->jsonSerialize();
        $this->assertSame('APPLICATION', $array['application']);
        $this->assertSame(1, $array['device_type']);
        $this->assertSame('HWID', $array['hwid']);
        $this->assertNull($array['language']);
        $this->assertSame('PUSH_TOKEN', $array['push_token']);
        $this->assertSame(3600, $array['timezone']);

        // Test with the 'language' parameter set
        $registerDeviceRequest->setLanguage('fr');
        $array = $registerDeviceRequest->jsonSerialize();
        $this->assertSame('APPLICATION', $array['application']);
        $this->assertSame(1, $array['device_type']);
        $this->assertSame('HWID', $array['hwid']);
        $this->assertSame('fr', $array['language']);
        $this->assertSame('PUSH_TOKEN', $array['push_token']);
        $this->assertSame(3600, $array['timezone']);

        // Test that all the supported device types does not fail
        $registerDeviceRequest->setDeviceType(1)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(2)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(3)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(4)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(5)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(7)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(8)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(9)->jsonSerialize();
        $registerDeviceRequest->setDeviceType(10)->jsonSerialize();
    }
}
