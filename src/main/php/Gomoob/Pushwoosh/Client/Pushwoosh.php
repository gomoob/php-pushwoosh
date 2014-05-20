<?php

/**
 * Copyright 2014 SARL GOMOOB. All rights reserved.
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\IPushwoosh;
use Gomoob\Pushwoosh\PushwooshException;

use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Request\RegisterDeviceRequest;
use Gomoob\Pushwoosh\Model\Request\UnregisterDeviceRequest;

use Gomoob\Pushwoosh\Model\Response\CreateMessageResponse;
use Gomoob\Pushwoosh\Model\Response\RegisterDeviceResponse;
use Gomoob\Pushwoosh\Model\Response\UnregisterDeviceResponse;

/**
 * Class which defines a Pushwoosh client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Pushwoosh implements IPushwoosh {

	/**
	 * The the Pushwoosh application ID to be used by default by all the requests performed by the Pushwoosh client.
	 * This identifier can be overwritten by request if needed.
	 *
	 * @var string
	 */
	private $application;

	/**
	 * The Pushwoosh applications group code to be used to defautl by all the requests performed by the Pushwoosh client
	 * . This identifier can be overwritten by requests if needed.
	 *
	 * <p>WARNING: If the application is defined then the applications groups must not be defined.</p>
	 *
	 * @var string
	 */
	private $applicationsGroup;

	/**
	 * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
	 *
	 * @var string
	 */
	private $auth;

	private function pwCall($method, $data) {

		$url = 'https://cp.pushwoosh.com/json/1.3/' . $method;
		$request = json_encode(array('request' => $data));

		$ch = curl_init($url);

		// FIXME: FIX THIS !!!
		// see: http://curl.haxx.se/docs/sslcerts.html
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($request))
		);

		$response = curl_exec($ch);
		$error = curl_error($ch);

		if($error) {

			$info = curl_getinfo($ch);

			// FIXME
			var_dump($error);
			var_dump($info);

		}

		curl_close($ch);

		return json_decode($response, true);

	}

	/**
	 * {@inheritDoc}
	 */
    public function createMessage(CreateMessageRequest $createMessageRequest) {

    	// If both the 'application' and 'applicationsGroup' attribute are not set in the request we try to get a
    	// default one from the Pushwoosh client
    	if($createMessageRequest -> getApplication() === null && $createMessageRequest -> getApplicationsGroup() == null) {

    		// Setting both 'application' and 'applicationsGroup' is forbidden
    		if(!isset($this -> application) && !isset($this -> applicationsGroup)) {

    			throw new PushwooshException('None of the  \'application\' or \'applicationsGroup\' properties are set !');

    		}

    		// Setting none of the 'application' and 'applicationsGroup' parameters is an error here
    		else if(isset($this -> application) && isset($this -> applicationsGroup)) {

    			throw new PushwooshException('Both \'application\' and \'applicationsGroup\' properties are set !');

    		}

    		// Sets the 'application' attribute
    		else if(isset($this -> application)) {

    			$createMessageRequest -> setApplication($this -> application);

    		}

    		// Sets the 'applicationsGroup' attribute
    		else if(isset($this -> applicationsGroup)) {

    			$createMessageRequest -> setApplicationsGroup($this -> applicationsGroup);

    		}

    	}

    	// If the 'auth' parameter is not set in the request we try to get it from the Pushwoosh client
    	if($createMessageRequest -> getAuth() === null) {

    		// The 'auth' parameter is expected here
			if(!isset($this -> auth)) {

				throw new PushwooshException('The \'auth\' parameter is not set !');

			}

			// Use the 'auth' parameter defined in the Pushwoosh client
			else {

				$createMessageRequest -> setAuth($this -> auth);

			}

    	}

    	$response = $this -> pwCall('createMessage', $createMessageRequest -> toJSON());

    	return CreateMessageResponse::create($response);

    }

    /**
     * {@inheritDoc}
     */
    public function deleteMessage() {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function getApplication() {

    	return $this -> application;

    }

    /**
     * {@inheritDoc}
     */
    public function getApplicationsGroup() {

    	return $this -> applicationsGroup;

    }

    /**
     * {@inheritDoc}
     */
    public function getAuth() {

    	return $this -> auth;

    }

    /**
     * {@inheritDoc}
     */
    public function getNearestZone() {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function pushStat() {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function registerDevice(RegisterDeviceRequest $registerDeviceRequest) {

    	$response = $this -> pwCall('registerDevice', $registerDeviceRequest -> toJSON());

    	return RegisterDeviceResponse::create($response);

    }

    /**
     * {@inheritDoc}
     */
    public function setApplication($application) {

    	$this -> application = $application;

    	return $this;

    }

    /**
     * {@inheritDoc}
     */
    public function setApplicationsGroup($applicationsGroup) {

    	$this -> applicationsGroup = $applicationsGroup;

    	return $this;

    }

    /**
     * {@inheritDoc}
     */
    public function setAuth($auth) {

    	$this -> auth = $auth;

    	return $this;

    }

    /**
     * {@inheritDoc}
     */
    public function setBadge() {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function setTags() {
        // TODO: Auto-generated method stub

    }

    /**
     * {@inheritDoc}
     */
    public function unregisterDevice(UnregisterDeviceRequest $unregisterDeviceRequest) {

    	$response = $this -> pwCall('unregisterDevice', $unregisterDeviceRequest -> toJSON());

    	return UnregisterDeviceResponse::create($response);

    }

}
