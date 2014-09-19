<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\SetTagsRequest;
use Gomoob\Pushwoosh\Exception\PushwooshException;
use Gomoob\Pushwoosh\Model\Request\DeleteMessageRequest;
use Gomoob\Pushwoosh\Model\Request\GetNearestZoneRequest;
use Gomoob\Pushwoosh\Model\Request\PushStatRequest;
use Gomoob\Pushwoosh\Model\Request\GetTagsRequest;

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
     * Test method for the <tt>create()</tt> function.
     *
     * @group PushwooshTest.create
     */
    public function testCreate()
    {
        $pushwoosh = Pushwoosh::create();
        $this->assertNotNull($pushwoosh);
        $this->assertNotNull($pushwoosh->getCURLClient());
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
        $createMessageResponse = $pushwoosh->createMessage($createMessageRequest);

        $this->assertEquals(200, $createMessageResponse->getStatusCode());
        $this->assertEquals('OK', $createMessageResponse->getStatusMessage());
        $this->assertNotNull($createMessageResponse->getResponse());
        $this->assertCount(0, $createMessageResponse->getResponse()->getMessages());

        // Test a call with an error response
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 400,
                    'status_message' => 'KO',
                    'response' => array('Messages' => array())
                )
            )
        );
        $pushwoosh->setCURLClient($cURLClient);
        $createMessageResponse = $pushwoosh->createMessage($createMessageRequest);
        $this->assertEquals(400, $createMessageResponse->getStatusCode());
        $this->assertEquals('KO', $createMessageResponse->getStatusMessage());
        $this->assertNotNull($createMessageResponse->getResponse());
        $this->assertCount(0, $createMessageResponse->getResponse()->getMessages());

        // Test a call with an error response
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 400,
                    'status_message' => 'KO'
                )
            )
        );
        $pushwoosh->setCURLClient($cURLClient);
        $createMessageResponse = $pushwoosh->createMessage($createMessageRequest);
        $this->assertFalse($createMessageResponse->isOk());
        $this->assertEquals(400, $createMessageResponse->getStatusCode());
        $this->assertEquals('KO', $createMessageResponse->getStatusMessage());
        $this->assertNull($createMessageResponse->getResponse());

    }

    /**
     * Test method for the <tt>deleteMessage($deleteMessageRequest)</tt> function.
     *
     * @group PushwooshTest.deleteMessage
     */
    public function testDeleteMessage()
    {
        // Create a fake CURL client
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 200,
                    'status_message' => 'OK'
                )
            )
        );

        $pushwoosh = new Pushwoosh();
        $pushwoosh->setCURLClient($cURLClient);
        $deleteMessageRequest = DeleteMessageRequest::create()
            ->setMessage('MESSAGE');

        // Test with the 'auth' parameter not defined
        try {

            $pushwoosh->deleteMessage($deleteMessageRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'auth' parameter defined in the Pushwoosh client
        $pushwoosh->setAuth('AUTH');
        $deleteMessageRequest->setAuth(null);
        $pushwoosh->deleteMessage($deleteMessageRequest);

        // Test with the 'auth' parameter definied in the request
        $pushwoosh->setAuth(null);
        $deleteMessageRequest->setAuth('AUTH');
        $deleteMessageResponse = $pushwoosh->deleteMessage($deleteMessageRequest);

        $this->assertTrue($deleteMessageResponse->isOk());
        $this->assertEquals(200, $deleteMessageResponse->getStatusCode());
        $this->assertEquals('OK', $deleteMessageResponse->getStatusMessage());

        // Test a call with an error response
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 400,
                    'status_message' => 'KO'
                )
            )
        );
        $pushwoosh->setCURLClient($cURLClient);
        $deleteMessageResponse = $pushwoosh->deleteMessage($deleteMessageRequest);
        $this->assertFalse($deleteMessageResponse->isOk());
        $this->assertEquals(400, $deleteMessageResponse->getStatusCode());
        $this->assertEquals('KO', $deleteMessageResponse->getStatusMessage());

    }

    /**
     * Test method for the <tt>getNearestZone($nearestZoneRequest)</tt> function.
     */
    public function testGetNearestZone()
    {
        // Create a fake CURL client
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 200,
                    'status_message' => 'OK'
                )
            )
        );

        $pushwoosh = new Pushwoosh();
        $pushwoosh->setCURLClient($cURLClient);
        $getNearestZoneRequest = GetNearestZoneRequest::create()
            ->setHwid('HWID')
            ->setLat(1.0)
            ->setLng(2.0);

        // Test with the 'application' parameter not defined
        try {

            $pushwoosh->getNearestZone($getNearestZoneRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'application' parameter defined in the Pushwoosh client
        $pushwoosh->setApplication('APPLICATION');
        $getNearestZoneRequest->setApplication(null);
        $pushwoosh->getNearestZone($getNearestZoneRequest);

        // Test with the 'application' parameter definied in the request
        $pushwoosh->setApplication(null);
        $getNearestZoneRequest->setApplication('APPLICATION');
        $getNearestZoneResponse = $pushwoosh->getNearestZone($getNearestZoneRequest);

        $this->assertTrue($getNearestZoneResponse->isOk());
        $this->assertEquals(200, $getNearestZoneResponse->getStatusCode());
        $this->assertEquals('OK', $getNearestZoneResponse->getStatusMessage());

        // Test a call with an error response
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 400,
                    'status_message' => 'KO'
                )
            )
        );
        $pushwoosh->setCURLClient($cURLClient);
        $getNearestZoneResponse = $pushwoosh->getNearestZone($getNearestZoneRequest);
        $this->assertFalse($getNearestZoneResponse->isOk());
        $this->assertEquals(400, $getNearestZoneResponse->getStatusCode());
        $this->assertEquals('KO', $getNearestZoneResponse->getStatusMessage());

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $pushwoosh = new Pushwoosh();
        $this->assertNull($pushwoosh->getApplication());
        $this->assertSame($pushwoosh, $pushwoosh->setApplication('APPLICATION'));
        $this->assertEquals('APPLICATION', $pushwoosh->getApplication());
    }

    /**
     * Test method for the <tt>getApplicationsGroup()</tt> and <tt>setApplicationsGroup($applicationsGroup)</tt>
     * functions.
     */
    public function testGetSetApplicationsGroup()
    {
        $pushwoosh = new Pushwoosh();
        $this->assertNull($pushwoosh->getApplicationsGroup());
        $this->assertSame($pushwoosh, $pushwoosh->setApplicationsGroup('APPLICATIONS_GROUP'));
        $this->assertEquals('APPLICATIONS_GROUP', $pushwoosh->getApplicationsGroup());
    }

    /**
     * Test method for the <tt>getAuth()</tt> and <tt>setAuth($auth)</tt> functions.
     */
    public function testGetSetAuth()
    {
        $pushwoosh = new Pushwoosh();
        $this->assertNull($pushwoosh->getAuth());
        $this->assertSame($pushwoosh, $pushwoosh->setAuth('AUTH'));
        $this->assertEquals('AUTH', $pushwoosh->getAuth());
    }

    /**
     * Test method for the <tt>getTags($getTagsRequest)</tt> function.
     */
    public function testGetTags()
    {
        // Create a fake CURL client
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 200,
                    'status_message' => 'OK',
                    'response' => array(
                        'result' => array(
                            'tag0' => 'tag0Value',
                            'tag1' => 'tag1Value',
                            'tag2' => 'tag2Value'
                        )
                    )
                )
            )
        );

        $pushwoosh = new Pushwoosh();
        $pushwoosh->setCURLClient($cURLClient);

        $getTagsRequest = GetTagsRequest::create()->setHwid('HWID');

        // Test with the 'application' parameter not defined
        try {

            $pushwoosh->getTags($getTagsRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'auth' parameter not defined
        $pushwoosh->setApplication('APPLICATION');
        try {

            $pushwoosh->getTags($getTagsRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'application' and 'auth' parameters definied in the Pushwoosh client
        $pushwoosh->setApplication('APPLICATION');
        $pushwoosh->setAuth('AUTH');
        $getTagsRequest->setApplication(null);
        $getTagsRequest->setAuth(null);
        $pushwoosh->getTags($getTagsRequest);

        // Test with the 'application' and 'auth' parameters definied in the request
        $pushwoosh->setApplication(null);
        $pushwoosh->setAuth(null);
        $getTagsRequest->setApplication('APPLICATION');
        $getTagsRequest->setAuth('AUTH');
        $pushwoosh->getTags($getTagsRequest);

        // Test with the 'application' defined in the Pushwoosh client and the 'auth' parameter defined in the request
        $pushwoosh->setApplication('APPLICATION');
        $pushwoosh->setAuth(null);
        $getTagsRequest->setApplication(null);
        $getTagsRequest->setAuth('AUTH');
        $pushwoosh->getTags($getTagsRequest);

        // Test with the 'application' defined in the request and the 'auth' parameter defined in the Pushwoosh client
        $pushwoosh->setApplication(null);
        $pushwoosh->setAuth('AUTH');
        $getTagsRequest->setApplication('APPLICATION');
        $getTagsRequest->setAuth(null);
        $getTagsResponse = $pushwoosh->getTags($getTagsRequest);

        $getTagsResponseResponse = $getTagsResponse->getResponse();
        $this->assertNotNull($getTagsResponseResponse);

        $result = $getTagsResponseResponse->getResult();
        $this->assertCount(3, $result);
        $this->assertEquals('tag0Value', $result['tag0']);
        $this->assertEquals('tag1Value', $result['tag1']);
        $this->assertEquals('tag2Value', $result['tag2']);

        $tags = $getTagsResponseResponse->getTags();
        $this->assertCount(3, $tags);
        $this->assertEquals('tag0Value', $tags['tag0']);
        $this->assertEquals('tag1Value', $tags['tag1']);
        $this->assertEquals('tag2Value', $tags['tag2']);

        $this->assertTrue($getTagsResponseResponse->hasTag('tag0'));
        $this->assertTrue($getTagsResponseResponse->hasTag('tag1'));
        $this->assertTrue($getTagsResponseResponse->hasTag('tag2'));

        $this->assertTrue($getTagsResponse->isOk());
        $this->assertEquals(200, $getTagsResponse->getStatusCode());
        $this->assertEquals('OK', $getTagsResponse->getStatusMessage());

        // Test a call with an error response
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 400,
                    'status_message' => 'KO'
                )
            )
        );
        $pushwoosh->setCURLClient($cURLClient);
        $getTagsResponse = $pushwoosh->getTags($getTagsRequest);
        $this->assertFalse($getTagsResponse->isOk());
        $this->assertEquals(400, $getTagsResponse->getStatusCode());
        $this->assertEquals('KO', $getTagsResponse->getStatusMessage());
    }

    /**
     * Test method for the <tt>pushStat($pushStatRequest)</tt> function.
     */
    public function testPushStat()
    {
        // Create a fake CURL client
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 200,
                    'status_message' => 'OK'
                )
            )
        );

        $pushwoosh = new Pushwoosh();
        $pushwoosh->setCURLClient($cURLClient);
        $pushStatRequest = PushStatRequest::create()
            ->setHwid('HWID')
            ->setHash('hash');

        // Test with the 'application' parameter not defined
        try {

            $pushwoosh->pushStat($pushStatRequest);
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test with the 'application' parameter defined in the Pushwoosh client
        $pushwoosh->setApplication('APPLICATION');
        $pushStatRequest->setApplication(null);
        $pushwoosh->pushStat($pushStatRequest);

        // Test with the 'application' parameter definied in the request
        $pushwoosh->setApplication(null);
        $pushStatRequest->setApplication('APPLICATION');
        $pushStatResponse = $pushwoosh->pushStat($pushStatRequest);

        $this->assertTrue($pushStatResponse->isOk());
        $this->assertEquals(200, $pushStatResponse->getStatusCode());
        $this->assertEquals('OK', $pushStatResponse->getStatusMessage());

        // Test a call with an error response
        $cURLClient = $this->getMock('Gomoob\Pushwoosh\ICURLClient');
        $cURLClient->expects($this->any())->method('pushwooshCall')->will(
            $this->returnValue(
                array(
                    'status_code' => 400,
                    'status_message' => 'KO'
                )
            )
        );
        $pushwoosh->setCURLClient($cURLClient);
        $pushStatResponse = $pushwoosh->pushStat($pushStatRequest);
        $this->assertFalse($pushStatResponse->isOk());
        $this->assertEquals(400, $pushStatResponse->getStatusCode());
        $this->assertEquals('KO', $pushStatResponse->getStatusMessage());
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
