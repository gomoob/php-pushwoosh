<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\Client\Pushwoosh;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Notification\Notification;

/**
 * Test case used to test the <code>Pushwoosh</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group PushwooshTest
 */
class PushwooshTest extends \PHPUnit_Framework_TestCase {

	/**
	 * An array which contains test configuration properties.
	 *
	 * @var array
	 */
	private $pushwooshTestProperties;

	/**
	 * Function called before each test execution.
	 */
	public function setUp() {

		$testConfigurationFile = TEST_RESOURCES_DIRECTORY . '/pushwoosh-test-properties.json';

		// The test configuration must exist
		if(!file_exists($testConfigurationFile)) {

			throw new \Exception('The file \'' . $testConfigurationFile . '\' does not exist !');

		}

		// Read the test configuration
		$this -> pushwooshTestProperties = json_decode(file_get_contents($testConfigurationFile), true);

	}

	/**
	 * Test method for the <tt>createMessage()</tt> function.
	 */
	public function testCreateMessage() {

		$pushwoosh = new Pushwoosh();

		$createMessageRequest = new CreateMessageRequest();
		$createMessageRequest -> setApplication($this -> pushwooshTestProperties['application']);
		$createMessageRequest -> setAuth($this -> pushwooshTestProperties['auth']);

		$notification = new Notification();
		$createMessageRequest -> setNotifications(array($notification));

		// Test with a CreateMessageRequest without any notification
		$createMessageResponse = $pushwoosh -> createMessage($createMessageRequest);
		$this -> assertNotNull($createMessageResponse);
		$this -> assertEquals(200, $createMessageResponse -> getStatusCode());
		$this -> assertEquals('OK', $createMessageResponse -> getStatusMessage());
		$this -> assertNotNull($createMessageResponse -> getResponse());
		$this -> assertCount(1, $createMessageResponse -> getResponse() -> getMessages());

	}

	/**
	 * Test method for the <tt>registerDevice()</tt> function.
	 */
	public function testRegisterDevice() {

		$pushwoosh = new Pushwoosh();

	}

}
