<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Test case used to test the <code>CreateMessageRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group CreateMessageRequestTest
 */
class CreateMessageRequestTest extends \PHPUnit_Framework_TestCase {

	/**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
	public function testToJSON() {

		$createMessageRequest = new CreateMessageRequest();

		// Test without the 'application' and 'applicationsGroup' parameters
		try {

			$createMessageRequest -> toJSON();
			$this -> fail('Must have thrown a PushwooshException !');

		} catch(PushwooshException $pe) {

			// Expected

		}

		// Test with both the 'application' and 'applicationsGroup parameters set
		$createMessageRequest -> setApplication('XXXX-XXXX');
		$createMessageRequest -> setApplicationsGroup('XXXX-XXXX');

		try {

			$createMessageRequest -> toJSON();
			$this -> fail('Must have thrown a PushwooshException !');

		} catch(PushwooshException $pe) {

			// Expected

		}

		// Test with the 'auth' parameter set
		$createMessageRequest -> setApplicationsGroup(null);

		try {

			$createMessageRequest -> toJSON();
			$this -> fail('Must have thrown a PushwooshException !');

		} catch(PushwooshException $pe) {

			// Expected

		}

		// Test without any notification set
		$createMessageRequest -> setAuth('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

		try {

			$createMessageRequest -> toJSON();
			$this -> fail('Must have thrown a PushwooshException !');

		} catch(PushwooshException $pe) {

			// Expected

		}

	}

}