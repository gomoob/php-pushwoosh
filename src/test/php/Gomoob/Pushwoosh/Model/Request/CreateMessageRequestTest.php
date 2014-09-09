<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;
use Gomoob\Pushwoosh\Model\Notification\Notification;

/**
 * Test case used to test the <code>CreateMessageRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group CreateMessageRequestTest
 */
class CreateMessageRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $createMessageRequest = new CreateMessageRequest();

        // Test without the 'application' and 'applicationsGroup' parameters
        try {

            $createMessageRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with both the 'application' and 'applicationsGroup parameters set
        $createMessageRequest->setApplication('XXXX-XXXX');
        $createMessageRequest->setApplicationsGroup('XXXX-XXXX');

        try {

            $createMessageRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'auth' parameter set
        $createMessageRequest->setApplicationsGroup(null);

        try {

            $createMessageRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'auth' and 'application' parameters set and no notification
        $createMessageRequest->setAuth('XXXX');

        $json = $createMessageRequest->toJSON();
        $this->assertCount(4, $json);
        $this->assertTrue(array_key_exists('application', $json));
        $this->assertTrue(array_key_exists('applicationsGroup', $json));
        $this->assertTrue(array_key_exists('auth', $json));
        $this->assertTrue(array_key_exists('notifications', $json));
        $this->assertEquals('XXXX-XXXX', $json['application']);
        $this->assertNull($json['applicationsGroup']);
        $this->assertEquals('XXXX', $json['auth']);
        $this->assertCount(0, $json['notifications']);

        // Test with one notificiation with only a 'content' field
        $notification = Notification::create();
        $notification->setContent('CONTENT');
        $createMessageRequest->addNotification($notification);

        $json = $createMessageRequest->toJSON();
        $this->assertCount(4, $json);
        $this->assertTrue(array_key_exists('application', $json));
        $this->assertTrue(array_key_exists('applicationsGroup', $json));
        $this->assertTrue(array_key_exists('auth', $json));
        $this->assertTrue(array_key_exists('notifications', $json));
        $this->assertEquals('XXXX-XXXX', $json['application']);
        $this->assertNull($json['applicationsGroup']);
        $this->assertEquals('XXXX', $json['auth']);
        $this->assertCount(1, $json['notifications']);
        $this->assertCount(3, $json['notifications'][0]);
        $this->assertTrue(array_key_exists('send_date', $json['notifications'][0]));
        $this->assertTrue($json['notifications'][0]['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['notifications'][0]['content']);

        // Test with one notification having additional data
        $notification->setDataParameter('DATA_PARAMETER_1', 'DATA_PARAMETER_1_VALUE');
        $notification->setDataParameter('DATA_PARAMETER_2', 'DATA_PARAMETER_2_VALUE');
        $notification->setDataParameter('DATA_PARAMETER_3', 'DATA_PARAMETER_3_VALUE');

        $json = $createMessageRequest->toJSON();
        $this->assertCount(4, $json);
        $this->assertTrue(array_key_exists('application', $json));
        $this->assertTrue(array_key_exists('applicationsGroup', $json));
        $this->assertTrue(array_key_exists('auth', $json));
        $this->assertTrue(array_key_exists('notifications', $json));
        $this->assertEquals('XXXX-XXXX', $json['application']);
        $this->assertNull($json['applicationsGroup']);
        $this->assertEquals('XXXX', $json['auth']);
        $this->assertCount(1, $json['notifications']);
        $this->assertCount(4, $json['notifications'][0]);
        $this->assertTrue(array_key_exists('send_date', $json['notifications'][0]));
        $this->assertTrue($json['notifications'][0]['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['notifications'][0]['content']);
        $this->assertCount(3, $json['notifications'][0]['data']);
        $this->assertEquals('DATA_PARAMETER_1_VALUE', $json['notifications'][0]['data']['DATA_PARAMETER_1']);
        $this->assertEquals('DATA_PARAMETER_2_VALUE', $json['notifications'][0]['data']['DATA_PARAMETER_2']);
        $this->assertEquals('DATA_PARAMETER_3_VALUE', $json['notifications'][0]['data']['DATA_PARAMETER_3']);

        // Test with one notification hacing additional data and devices
        $notification->addDevice('DEVICE_TOKEN_1');
        $notification->addDevice('DEVICE_TOKEN_2');
        $notification->addDevice('DEVICE_TOKEN_3');

        $json = $createMessageRequest->toJSON();
        $this->assertCount(4, $json);
        $this->assertTrue(array_key_exists('application', $json));
        $this->assertTrue(array_key_exists('applicationsGroup', $json));
        $this->assertTrue(array_key_exists('auth', $json));
        $this->assertTrue(array_key_exists('notifications', $json));
        $this->assertEquals('XXXX-XXXX', $json['application']);
        $this->assertNull($json['applicationsGroup']);
        $this->assertEquals('XXXX', $json['auth']);
        $this->assertCount(1, $json['notifications']);
        $this->assertCount(5, $json['notifications'][0]);
        $this->assertTrue(array_key_exists('send_date', $json['notifications'][0]));
        $this->assertTrue($json['notifications'][0]['ignore_user_timezone']);
        $this->assertEquals('CONTENT', $json['notifications'][0]['content']);
        $this->assertCount(3, $json['notifications'][0]['data']);
        $this->assertEquals('DATA_PARAMETER_1_VALUE', $json['notifications'][0]['data']['DATA_PARAMETER_1']);
        $this->assertEquals('DATA_PARAMETER_2_VALUE', $json['notifications'][0]['data']['DATA_PARAMETER_2']);
        $this->assertEquals('DATA_PARAMETER_3_VALUE', $json['notifications'][0]['data']['DATA_PARAMETER_3']);
        $this->assertCount(3, $json['notifications'][0]['devices']);
        $this->assertEquals('DEVICE_TOKEN_1', $json['notifications'][0]['devices'][0]);
        $this->assertEquals('DEVICE_TOKEN_2', $json['notifications'][0]['devices'][1]);
        $this->assertEquals('DEVICE_TOKEN_3', $json['notifications'][0]['devices'][2]);

    }
}
