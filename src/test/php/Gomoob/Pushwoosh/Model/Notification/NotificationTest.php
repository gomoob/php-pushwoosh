<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Notification</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group NotificationTest
 */
class NotificationTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        // Test with a sigle content
        $notification = Notification::create();
        $notification->setContent('CONTENT');

        $json = $notification->toJSON();
        $this->assertCount(3, $json);
        $this->assertTrue(array_key_exists('ignore_user_timezone', $json));
        $this->assertTrue(array_key_exists('send_date', $json));
        $this->assertTrue(array_key_exists('content', $json));
        $this->assertTrue($json['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['content']);

        // Test with additional data
        $notification->setDataParameter('DATA_PARAMETER_1', 'DATA_PARAMETER_1_VALUE');
        $notification->setDataParameter('DATA_PARAMETER_2', 'DATA_PARAMETER_2_VALUE');
        $notification->setDataParameter('DATA_PARAMETER_3', 'DATA_PARAMETER_3_VALUE');

        $json = $notification->toJSON();
        $this->assertCount(4, $json);
        $this->assertTrue(array_key_exists('ignore_user_timezone', $json));
        $this->assertTrue(array_key_exists('send_date', $json));
        $this->assertTrue(array_key_exists('content', $json));
        $this->assertTrue(array_key_exists('data', $json));
        $this->assertTrue($json['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['content']);
        $this->assertCount(3, $json['data']);
        $this->assertEquals('DATA_PARAMETER_1_VALUE', $json['data']['DATA_PARAMETER_1']);
        $this->assertEquals('DATA_PARAMETER_2_VALUE', $json['data']['DATA_PARAMETER_2']);
        $this->assertEquals('DATA_PARAMETER_3_VALUE', $json['data']['DATA_PARAMETER_3']);

        // Test with devices
        $notification->addDevice('TOKEN_DEVICE_1');
        $notification->addDevice('TOKEN_DEVICE_2');
        $notification->addDevice('TOKEN_DEVICE_3');

        $json = $notification->toJSON();
        $this->assertCount(5, $json);
        $this->assertTrue(array_key_exists('ignore_user_timezone', $json));
        $this->assertTrue(array_key_exists('send_date', $json));
        $this->assertTrue(array_key_exists('content', $json));
        $this->assertTrue(array_key_exists('data', $json));
        $this->assertTrue(array_key_exists('devices', $json));
        $this->assertTrue($json['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['content']);
        $this->assertCount(3, $json['data']);
        $this->assertEquals('DATA_PARAMETER_1_VALUE', $json['data']['DATA_PARAMETER_1']);
        $this->assertEquals('DATA_PARAMETER_2_VALUE', $json['data']['DATA_PARAMETER_2']);
        $this->assertEquals('DATA_PARAMETER_3_VALUE', $json['data']['DATA_PARAMETER_3']);
        $this->assertCount(3, $json['devices']);
        $this->assertEquals('TOKEN_DEVICE_1', $json['devices'][0]);
        $this->assertEquals('TOKEN_DEVICE_2', $json['devices'][1]);
        $this->assertEquals('TOKEN_DEVICE_3', $json['devices'][2]);

    }
}
