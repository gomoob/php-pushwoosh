<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
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
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $createMessageRequest = CreateMessageRequest::create();

        $this->assertNotNull($createMessageRequest);

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt>
     * functions.
     */
    public function testGetSetApplication()
    {
        $createMessageRequest = new CreateMessageRequest();
        $this->assertNull($createMessageRequest->getApplication());
        $createMessageRequest->setApplication('APPLICATION');
        $this->assertEquals('APPLICATION', $createMessageRequest->getApplication());

    }

    /**
     * Test method for the <tt>getApplicationsGroup()</tt> and <tt>setApplicationsGroup($applicationsGroup)</tt>
     * functions.
     */
    public function testGetSetApplicationsGroup()
    {
        $createMessageRequest = new CreateMessageRequest();
        $this->assertNull($createMessageRequest->getApplicationsGroup());
        $createMessageRequest->setApplicationsGroup('APPLICATIONS_GROUP');
        $this->assertEquals('APPLICATIONS_GROUP', $createMessageRequest->getApplicationsGroup());
    }

    /**
     * Test method for the <tt>getAuth()</tt> and <tt>setAuth($auth)</tt> functions.
     */
    public function testGetSetAuth()
    {
        $createMessageRequest = new CreateMessageRequest();
        $this->assertNull($createMessageRequest->getAuth());
        $createMessageRequest->setAuth('XXXX');
        $this->assertEquals('XXXX', $createMessageRequest->getAuth());
    }

    /**
     * Test method for the <tt>getNotifications()</tt> and <tt>setNotifications(array $notifications)</tt> functions.
     */
    public function testGetSetNotifications()
    {
        $createMessageRequest = new CreateMessageRequest();
        $this->assertNull($createMessageRequest->getNotifications());

        // Test with the 'addNotification' medthod
        $notification0 = new Notification();
        $notification1 = new Notification();
        $notification2 = new Notification();

        $createMessageRequest->addNotification($notification0);
        $createMessageRequest->addNotification($notification1);
        $createMessageRequest->addNotification($notification2);

        $notifications = $createMessageRequest->getNotifications();
        $this->assertCount(3, $notifications);
        $this->assertSame($notification0, $notifications[0]);
        $this->assertSame($notification1, $notifications[1]);
        $this->assertSame($notification2, $notifications[2]);

        // Test with the 'setNotifications' method
        $notification3 = new Notification();
        $notification4 = new Notification();
        $notification5 = new Notification();

        $createMessageRequest->setNotifications(
            array(
                $notification3,
                $notification4,
                $notification5
            )
        );

        $notifications = $createMessageRequest->getNotifications();
        $this->assertCount(3, $notifications);
        $this->assertSame($notification3, $notifications[0]);
        $this->assertSame($notification4, $notifications[1]);
        $this->assertSame($notification5, $notifications[2]);

    }

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
        $notification->setData(
            array(
                'DATA_PARAMETER_1' => 'DATA_PARAMETER_1_VALUE',
                'DATA_PARAMETER_2' => 'DATA_PARAMETER_2_VALUE',
                'DATA_PARAMETER_3' => 'DATA_PARAMETER_3_VALUE'
            )
        );

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
