<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */

// Composer autoloading
// @codingStandardsIgnoreStart
if (file_exists(__DIR__ . '/../../../../vendor/autoload.php')) {
    include __DIR__ . '/../../../../vendor/autoload.php';
} else {
    printf('Fail to autoload composer from file \'%s\'', 'vendor/autoload.php');
    exit;
}
// @codingStandardsIgnoreEnd

use Gomoob\Pushwoosh\Client\Pushwoosh;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;
use Gomoob\Pushwoosh\Model\Notification\Notification;

// Create a Pushwoosh client
$pushwoosh = Pushwoosh::create()
    ->setApplication('XXXXX-XXXXX')
    ->setAuth('XXXXXXXX');

// Create a request for the '/createMessage' Web Service
$request = CreateMessageRequest::create()
    ->addNotification(Notification::create()->setContent('Hello Jean !'));

// Call the REST Web Service
$response = $pushwoosh->createMessage($request);

// Check if its ok
if($response->isOk()) {
    print 'Great, my message has been sent !';
} else {
    print 'Oups, the sent failed :-(' . PHP_EOL;
    print 'Status code : ' . $response->getStatusCode() . PHP_EOL;
    print 'Status message : ' . $response->getStatusMessage() . PHP_EOL;
}
