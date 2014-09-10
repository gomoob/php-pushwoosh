<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Test case used to test the <code>RegisterDeviceRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group RegisterDeviceRequestTest
 */
class RegisterDeviceRequestTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals('APPLICATION', $registerDeviceRequest->getApplication());
    }

    /**
     * Test method for the <tt>getDeviceType()</tt> and <tt>setDeviceType($deviceType)</tt> functions.
     */
    public function testGetSetDeviceType()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getDeviceType());
        $registerDeviceRequest->setDeviceType(1);
        $this->assertEquals(1, $registerDeviceRequest->getDeviceType());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getHwid());
        $registerDeviceRequest->setHwid('HWID');
        $this->assertEquals('HWID', $registerDeviceRequest->getHwid());
    }

    /**
     * Test method for the <tt>getLanguage()</tt> and <tt>setLanguage($language)</tt> functions.
     */
    public function testGetSetLanguage()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getLanguage());
        $registerDeviceRequest->setLanguage('fr');
        $this->assertEquals('fr', $registerDeviceRequest->getLanguage());
    }

    /**
     * Test method for the <tt>getPushToken()</tt> and <tt>setPushToken($pushToken)</tt> functions.
     */
    public function testGetSetPushToken()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getPushToken());
        $registerDeviceRequest->setPushToken('PUSH_TOKEN');
        $this->assertEquals('PUSH_TOKEN', $registerDeviceRequest->getPushToken());
    }

    /**
     * Test method for the <tt>getTimezone()</tt> and <tt>setTimezone($timezone)</tt> functions.
     */
    public function testGetSetTimezone()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();
        $this->assertNull($registerDeviceRequest->getTimezone());
        $registerDeviceRequest->setTimezone(3600);
        $this->assertEquals(3600, $registerDeviceRequest->getTimezone());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $registerDeviceRequest = new RegisterDeviceRequest();

        // Test without the 'application' parameter set
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'deviceType' parameter set
        $registerDeviceRequest->setApplication('APPLICATION');
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with a bad 'deviceType' parameter set (special value 6)
        $registerDeviceRequest->setDeviceType(6);
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with a bad 'deviceType' parameter set
        $registerDeviceRequest->setDeviceType(100);
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hwid' parameter set
        $registerDeviceRequest->setDeviceType(1);
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'pushToken' parameter set
        $registerDeviceRequest->setHwid('HWID');
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'timezone' parameter set
        $registerDeviceRequest->setPushToken('PUSH_TOKEN');
        try {

            $registerDeviceRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        $registerDeviceRequest->setTimezone(3600);

        // Test without the 'language' parameter set
        $array = $registerDeviceRequest->toJSON();
        $this->assertEquals('APPLICATION', $array['application']);
        $this->assertEquals(1, $array['device_type']);
        $this->assertEquals('HWID', $array['hwid']);
        $this->assertNull($array['language']);
        $this->assertEquals('PUSH_TOKEN', $array['push_token']);
        $this->assertEquals(3600, $array['timezone']);

        // Test with the 'language' parameter set
        $registerDeviceRequest->setLanguage('fr');
        $array = $registerDeviceRequest->toJSON();
        $this->assertEquals('APPLICATION', $array['application']);
        $this->assertEquals(1, $array['device_type']);
        $this->assertEquals('HWID', $array['hwid']);
        $this->assertEquals('fr', $array['language']);
        $this->assertEquals('PUSH_TOKEN', $array['push_token']);
        $this->assertEquals(3600, $array['timezone']);

        // Test that all the supported device types does not fail
        $registerDeviceRequest->setDeviceType(1)->toJSON();
        $registerDeviceRequest->setDeviceType(2)->toJSON();
        $registerDeviceRequest->setDeviceType(3)->toJSON();
        $registerDeviceRequest->setDeviceType(4)->toJSON();
        $registerDeviceRequest->setDeviceType(5)->toJSON();
        $registerDeviceRequest->setDeviceType(7)->toJSON();
        $registerDeviceRequest->setDeviceType(8)->toJSON();
        $registerDeviceRequest->setDeviceType(9)->toJSON();
        $registerDeviceRequest->setDeviceType(10)->toJSON();

    }
}
