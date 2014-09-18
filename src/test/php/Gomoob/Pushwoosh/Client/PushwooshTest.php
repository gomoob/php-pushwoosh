<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\Model\Notification\IOS;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Notification\Notification;
use Gomoob\Pushwoosh\Model\Notification\Android;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\SetTagsRequest;
use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Test case used to test the <code>Pushwoosh</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group PushwooshTest
 */
class PushwooshTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * An array which contains test configuration properties.
	 *
	 * @var array
	 */
    private $pushwooshTestProperties;

    /**
	 * Function called before each test execution.
	 */
    public function setUp()
    {
        /*
        $testConfigurationFile = TEST_RESOURCES_DIRECTORY . '/pushwoosh-test-properties.json';

        // The test configuration must exist
        if (!file_exists($testConfigurationFile)) {

            throw new \Exception('The file \'' . $testConfigurationFile . '\' does not exist !');

        }

        // Read the test configuration
        $this->pushwooshTestProperties = json_decode(file_get_contents($testConfigurationFile), true);
		*/

    }

    /**
	 * Test method for the <tt>createMessage($createMessageRequest)</tt> function.
	 *
	 * @group PushwooshTest.testCreateMessage
	 */
    public function testCreateMessage()
    {
        // Create a fake CURL client
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 200,
                    'status_message' => 'OK',
                    'response' => array('Messages' => array())
                )
            )
        );

        $pushwoosh = new Pushwoosh();
        $pushwoosh->setCURLClient($cURLClient);
        $createMessageRequest = new CreateMessageRequest();

        // Test with none of the 'application' or 'applicationGroup' parameters set
        try {

            $pushwoosh->createMessage($createMessageRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with both the 'application' and 'applicationsGroup' parameters set
        $pushwoosh->setApplication('APPLICATION');
        $pushwoosh->setApplicationsGroup('APPLICATIONS_GROUP');
        try {

            $pushwoosh->createMessage($createMessageRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'auth' parameter provided
        $pushwoosh->setApplicationsGroup(null);
        try {

            $pushwoosh->createMessage($createMessageRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Call with 'application' and 'auth' set in the Pushwoosh client
        $pushwoosh->setApplication('APPLICATION');
        $pushwoosh->setApplicationsGroup(null);
        $pushwoosh->setAuth('AUTH');
        $createMessageRequest->setApplication(null);
        $createMessageRequest->setApplicationsGroup(null);
        $createMessageRequest->setAuth(null);
        $pushwoosh->createMessage($createMessageRequest);

        // Call with 'applicationsGroup' and 'auth' set in the Pushwoosh client
        $pushwoosh->setApplication(null);
        $pushwoosh->setApplicationsGroup('APPLICATIONS_GROUP');
        $pushwoosh->setAuth('AUTH');
        $createMessageRequest->setApplication(null);
        $createMessageRequest->setApplicationsGroup(null);
        $createMessageRequest->setAuth(null);
        $pushwoosh->createMessage($createMessageRequest);

        // Call with 'application' set on the Pushwoosh client and 'auth' set on the request
        $pushwoosh->setApplication('APPLICATION');
        $pushwoosh->setApplicationsGroup(null);
        $pushwoosh->setAuth(null);
        $createMessageRequest->setApplication(null);
        $createMessageRequest->setApplicationsGroup(null);
        $createMessageRequest->setAuth('AUTH');
        $pushwoosh->createMessage($createMessageRequest);

        // Call with 'applicationsGroup' set on the Pushwoosh client and 'auth' set on the request
        $pushwoosh->setApplication(null);
        $pushwoosh->setApplicationsGroup('APPLICATIONS_GROUP');
        $pushwoosh->setAuth(null);
        $createMessageRequest->setApplication(null);
        $createMessageRequest->setApplicationsGroup(null);
        $createMessageRequest->setAuth('AUTH');
        $pushwoosh->createMessage($createMessageRequest);

        // Call with 'application' and 'auth' set on the request
        $pushwoosh->setApplication(null);
        $pushwoosh->setApplicationsGroup(null);
        $pushwoosh->setAuth(null);
        $createMessageRequest->setApplication('APPLICATION');
        $createMessageRequest->setApplicationsGroup(null);
        $createMessageRequest->setAuth('AUTH');
        $pushwoosh->createMessage($createMessageRequest);

        // Call with 'application' set on the request and 'auth' set on the Pushwoosh client
        $pushwoosh->setApplication(null);
        $pushwoosh->setApplicationsGroup(null);
        $pushwoosh->setAuth('AUTH');
        $createMessageRequest->setApplication('APPLICATION');
        $createMessageRequest->setApplicationsGroup(null);
        $createMessageRequest->setAuth(null);
        $pushwoosh->createMessage($createMessageRequest);

        // Call with 'applicationsGroup' set on the resquets and 'auth' set on the Pushwoosh client
        $pushwoosh->setApplication(null);
        $pushwoosh->setApplicationsGroup(null);
        $pushwoosh->setAuth('AUTH');
        $createMessageRequest->setApplication(null);
        $createMessageRequest->setApplicationsGroup('APPLICATIONS_GROUP');
        $createMessageRequest->setAuth(null);
        $pushwoosh->createMessage($createMessageRequest);

        /*
        $request->setApplication($this->pushwooshTestProperties['application']);
        $request->setAuth($this->pushwooshTestProperties['auth']);

        $notification = new Notification();
        $request->setNotifications(array($notification));

        // Test with a CreateMessageRequest with an empty notification
        $response = $pushwoosh->createMessage($request);
        $this->assertNotNull($response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('OK', $response->getStatusMessage());
        $this->assertNotNull($response->getResponse());
        $this->assertCount(1, $response->getResponse()->getMessages());

        // Test with credentials set on the Pushwoosh client
        $pushwoosh = Pushwoosh::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setAuth($this->pushwooshTestProperties['auth']);

        $request = CreateMessageRequest::create()->addNotification(new Notification());
        $response = $pushwoosh->createMessage($request);
        $this->assertNotNull($response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('OK', $response->getStatusMessage());
        $this->assertNotNull($response->getResponse());
        $this->assertCount(1, $response->getResponse()->getMessages());

        // Test with a message having one notification
        $pushwoosh = Pushwoosh::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setAuth($this->pushwooshTestProperties['auth']);

        $request = CreateMessageRequest::create();

        $android = Android::create()->setHeader('My Sample Application');
        $iOS = IOS::create()->setBadges(1);
        $notification = Notification::create()
            ->setContent('Hello !')
            ->setAndroid($android)
            ->setIOS($iOS);

        $request->addNotification($notification);

        $response = $pushwoosh->createMessage($request);
        */

    }

    /**
     * Test method for the <tt>deleteMessage($deleteMessageRequest)</tt> function.
     *
     * @group PushwooshTest.deleteMessage
     */
    public function testDeleteMessage()
    {
    }

    /**
     * Test method for the <tt>getNearestZone($nearestZoneRequest)</tt> function.
     */
    public function testGetNearestZone()
    {
    }

    /**
     * Test method for the <tt>pushStat($pushStatRequest)</tt> function.
     */
    public function testPushStat()
    {
    }

    /**
	 * Test method for the <tt>registerDevice($registerDevice)</tt> function.
	 *
	 * @group PushwooshTest.testRegisterDevice
	 */
    public function testRegisterDevice()
    {
        $this->markTestSkipped(
            'Comment me to enable tests.'
        );

        $pushwoosh = Pushwoosh::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setAuth($this->pushwooshTestProperties['auth']);

        $request = RegisterDeviceRequest::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setDeviceType(3)
            ->setHwid('48df748567e3b130')
            ->setLanguage('fr')
            ->setPushToken(
                'APA91bFIFfTSUQJknA3atnY2ioN2M2VttHnhrdWZQu9wk03LC5QVHkUV4fcaXBnYOnGa0zLwMuGibHQDzrBke3MAC-' .
                'zq5r6EqLsMyQ-nyLA7mIpCSI5Q2Sg0FRrM9mXXwKxkvYGDZgRWN4X16MzAHPrskk69F0V0aPvLwUBeTW_VCHcO0oZ0GOc'
            );

        $response = $pushwoosh->registerDevice($request);

    }

    /**
     * Test method for the <tt>setBadge($setBadgeRequest)</tt> function.
     *
     * @group PushwooshTest.setBadge
     */
    public function testSetBadge()
    {
    }

    /**
	 * Test method for the <tt>setTags($setTagsRequest)</tt> function.
	 *
	 * @group PushwooshTest.setTags
	 */
    public function testSetTags()
    {
        $this->markTestSkipped(
            'Comment me to enable tests.'
        );

        $pushwoosh = Pushwoosh::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setAuth($this->pushwooshTestProperties['auth']);

        $request = SetTagsRequest::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setHwid('48df748567e3b130')
            ->setTags(array(
                'tag0' => 'tag0_value',
                'tag1' => 'tag1_value'
            ));

        $response = $pushwoosh->setTags($request);

    }

    /**
	 * Test method for the <tt>unregisterDevice($unregisterDeviceRequest)</tt> function.
	 *
	 * @group PushwooshTest.testUnregisterDevice
	 */
    public function testUnregisterDevice()
    {
        $this->markTestSkipped(
            'Comment me to enable tests.'
        );

        $pushwoosh = Pushwoosh::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setAuth($this->pushwooshTestProperties['auth']);

        $request = UnregisterDeviceRequest::create()
            ->setApplication($this->pushwooshTestProperties['application'])
            ->setHwid('48df748567e3b130');

        $response = $pushwoosh->unregisterDevice($request);

    }
}
