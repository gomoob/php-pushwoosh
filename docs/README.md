

Sample code to send a Pushwoosh message with the library : 

```php
// Create a Pushwoosh client
$pushwoosh = Pushwoosh::create() -> setApplication('XXXX-XXX') -> setAuth('xxxxxxxx');

// Create a request for the '/createMessage' service
$request = CreateMessageRequest::create() -> addNotification(Notification::create() -> setContent('Hello Jean !'));

// Call the REST Web Service
$response = $pushwoosh -> createMessage($request);

// Check if its ok
if($response -> isOk()) {
    print 'Great, my message has been sent !';
} else {
    print 'Oups, the sent failed :-('; 
    print 'Status code : ' . $response -> getStatusCode();
    print 'Status message : ' . $response -> getStatusMessage();
}

```

Easy, isn't it ?

# Installation 
The GoMoob Pushwoosh PHP Library should work with PHP 5.3 or higher. 

The easiest way to install the library is to use [composer](https://getcomposer.org/) and define the following dependency inside your `composer.json` file : 
```json
{
    "require": {
        "gomoob/php-pushwoosh": "~0.1.0"
    },
}
```

Then run a `composer update` command to pull the library and insert it inside your project's PHP dependencies.

# API Documentation

The GoMoob Pushwoosh PHP Library is written to be almost identic to the standard Pushwoosh REST API.

Calls to the Pushwoosh REST Web Services are done using a Pushwoosh client class. Then you call a method by using a 
request object and receive a response object with a success message or the detail of an error.

Each request sent to the Pushwoob REST Web Services is represented by a `xxxRequest` object / class defined in the 
`Gomoob\Pushwoosh\Model\Request` namespace. 

Each response returned by the Pushwoosh REST Web Services is represented by a `xxxResponse` object / class defined in 
the `Gomoob\Pushwoosh\Model\Response` namespace.

## Pushwoosh clients

The API provides 2 Pushwoosh clients which redeclare the methods described in the official [Pushwoosh Remote API 
guide](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api) : 

 * A standard Pushwoosh client defined by the `Gomoob\Pushwoosh\Client\Pushwoosh` class
 * A mock Pushwoosh client defined by the `Gomoob\Pushwoosh\Client\PushwooshMock` class

Those two classes implement the `Gomoob\Pushwoosh\IPushwoosh` interface where you'll find a copy of the documentation of each method described in the [Pushwoosh Remote API  guide](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api).

### Working with the standard Pushwoosh client

Using the standard Pushwoosh client is very easy, simply instanciate it and use it : 

```php
use Gomoob\Pushwoosh\Client\Pushwoosh;
use Gomoob\Pushwoosh\Model\Notification\Notification;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

$pushwoosh = new Pushwoosh();

$notification = Notification::create() -> setContent('Hello World !');

$createMessageRequest = CreateMessageRequest::create() 
    -> setApplication('XXXX-XXXX');
    -> setAuth('xxxxxxxx');
    -> setNotifications(array($notification));

$response = $pushwoosh -> createMessage($createMessageRequest);
```

Setting the `application` (or `applicationsGroup`) and `auth` parameters in each request can be boring. It is a good practice to keep those informations in one place only. You can set those informations on the Pushwoosh client directly, then the client will use them automatically.

```php
use Gomoob\Pushwoosh\Client\Pushwoosh;
use Gomoob\Pushwoosh\Model\Notification\Notification;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

$pushwoosh = Pushwoosh::create()
    -> setApplication('XXXX-XXX');
    -> setAuth('xxxxxxxx');

$createMessageRequest0 = CreateMessageRequest::create() 
    -> addNotification(Notification::create() -> setContent('Hello Jean !'));
$createMessageRequest1 = CreateMessageRequest::create() 
    -> addNotification(Notification::create() -> setContent('Hello Jacques !'));

$createMessageResponse0 = $pushwoosh -> createMessage($createMessageRequest0);
$createMessageResponse1 = $pushwoosh -> createMessage($createMessageRequest1);

```

### Working with the Mock Pushwoosh client

The Mock Pushwoosh client is a Mock object which implements the same software interface as the standard Pushwoosh client but which do not communicate with the Pushwoosh servers. 

The Mock Pushwoosh client is convenient when want to perform unit testing which are periodically executed by your continuous integration server and do not want to communicate with the Pushwoosh servers each time. 

The Mock Pushwoosh client can be used exactly the same way as the standard Pushwoosh client. The only thing you have to be careful of is that the Mock Pushwoosh client uses in memory arrays to simulate the storage used by the Pushwoosh servers. So, you data will be lost between each requests.

## Pushwoosh clients methods

### Method `/createMessage`
### Method `/deleteMessage`
### Method `/registerDevice`
### Method `/unregisterDevice`
### Method `/setTags`
### Method `/setBadge`
### Method `/pushStat`
### Method `/getNearestZone`

## Requests Data Model 

This chapter details each request object used by the API. 

### Class `CreateMessageRequest`

The  `CreateMessageRequest` class is used to call the `createMessage` Pushwoosh client method.

Methods : 
 * `__construct`            : Create a new `CreateMessageRequest` instance, this constructor has the same behavior as the `create` method.
```php
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

$createMessageRequest = new CreateMessageRequest();
```


 * `create`                 : Static method used to create a new `CreateMessageRequest` instance, this method has the same behavior as the constructor.
```php
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

$createMessageRequest = CreateMessageRequeste::create();
```
 
 * `addNotification`        : Method used to attach a new Pushwoosh notification to the create message request, this function returns the create message request instance to allow subsequent calls. 
```php
// Add notifications one by one
$createMessageRequest -> addNotification($notification0);
$createMessageRequest -> addNotification($notification1);

// Add multiple notifications in one shot
$createMessageRequest -> addNotification($notification2)
                      -> addNotification($notification3)
                      -> addNotification($notification4)
                      -> addNotification($notification5);
```
 
 
 * `getApplication`         : Gets the application ID where to send the messages to, if the application is defined then the applications group is not defined.
 * `getApplicationsGroup`   : Gets the Pushwoosh applications group code, if the applications group code is defined the application is not defined.  
 * `getAuth`                : Gets the API access token taken from the [Pushwoosh control panel](https://cp.pushwoosh.com/api_access).
 * `getNotifications`       : Gets an array of Pushwoosh notification attached to the create message request.
 * `setApplication`         : Sets the application ID where to send the messages to, if the application is defined tne the applications group must not be defined. 
 * `setApplicationsGroup`   : Sets the Pushwoosh applications group code, if the applications group code is defined then the application must not be defined.
 * `setAuth`                : Sets the API access token taken from the [Pushwoosh control panel](https://cp.pushwoosh.com/api_access).
 * `setNotifications`       : Sets the Pushwoosh notifications to attach to the create message request.
 * `toJSON`                 : Converts the informations of the request into an array which can be passed the PHP [`json_encode`](http://www.php.net/manual/function.json-encode.php) method.

### Class `DeleteMessageRequest`

The `DeleteMessageRequest` class is used to call the `deleteMessage` Pushwoosh client method.

Methods : 
 * `__construct`    :
 * `create`         : 
 * `getAuth`        : 
 * `getMessage`     :
 * `setAuth`        :
 * `setMessage`     :

### Class `RegisterDeviceRequest`

The `RegisterDeviceRequest` class is used to call the `registerDevice` Pushwoosh client method.

Methods : 
 * `__construct`    :
 * `create`         :
 * `getApplication` :
 * `getDeviceType`  :
 * `getHwid`        :
 * `getLanguage`    :
 * `getPushToken`   :
 * `getTimezone`    :
 * `setApplication` :
 * `setDeviceType`  :
 * `setHwid`        :
 * `setLanguage`    :
 * `setPushToken`   :
 * `setTimezone`    : 

### Class `UnregisterDeviceRequest`

The `UnregisterDeviceRequest` class is used to call the `unregisterDevice` Pushwoosh client method.

### Class `SetTagsRequest`

The `SetTagsRequest` class is used to call the `setTags` Pushwoosh client method.

### Class `SetBadgeRequest`

The `SetBadgeRequest` class is used to call the `setBadge` Pushwoosh client method.

### Class `PushStatRequest`

The `PushStatRequest` class is used to call the `pushStat` Pushwoosh client method.

### Class `GetNearestZoneRequest`

The `GetNearestZoneRequest` class is used to call the `getNearestZone` Pushwoosh client method.

## Responses Data Model

# FAQ

## When will the first version be released
At GOMOOB we are using the library in only one project for the moment ([My Good Moment](https://www.mygoodmoment.com)),
we did not encounter any problem and it works in production. 

But because the library is not complete already we can't claim to provide a stable version for now. Here are the tasks 
we will do before releasing a first stable version : 

 * Increase code coverage to at least 70%
 * Document the Pushwoosh Web services implemented in the library
 * Document the Pushwoosh Web services not already implemented in the library

## SSL error 
See http://curl.haxx.se/docs/sslcerts.html

# Release history

## 0.1.0-alpha5 (yyyy-mm-dd)
 * Code coverage is now 100% on the `Gomoob\Pushwoosh\Model\Request` package
 * Code coverage is now 100% on the `Gomoob\Pushwoosh\Model\Response` package
 * Add missing `Gomoob\Pushwoosh\Model\Request\GetTagsRequest` class
 * Add an abstract `Gomoob\Pushwoosh\Model\Response\AbstractResponse` class common to all response objects

## 0.1.0-alpha4 (2014-09-09)
 * Now the package is loaded using a [PSR-4](http://www.php-fig.org/psr/psr-4) autoloader instead of a 
   [PSR-0](http://www.php-fig.org/psr/psr-0) autoloader
 * Use [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) to ensure the code is compliant with 
   [PSR-0](http://www.php-fig.org/psr/psr-0) and [PSR-2](http://www.php-fig.org/psr/psr-2) coding rules
 * Upgrade Grunt dependency `grunt-phpunit`
 * Now the code is compliant with [PSR-0](http://www.php-fig.org/psr/psr-0) and 
   [PSR-2](http://www.php-fig.org/psr/psr-2) coding rules
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\ADM` class
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\Android` class
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\IOS` class
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\Mac` class
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\Safari` class
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\WNS` class
 * Reorganize attributes and functions in the `Gomoob\Pushwoosh\Model\Notification\WP` class
 * Updates the coding conventions in the `README.md` file
 * Append indications for Pull Requests in the `README.md` file
 * Ignore the `composer.lock` file from GIT
 * Build the project on Travis CI
 * Add Badge Poser badges in the `README.md` file
 * Enable [Coveralls](https://coveralls.io) to report code coverage with TravisCI

## 0.1.0-alpha3 (2014-06-25)
 * Third alpha release
 * Complete the IOS notification implementation into the `Gomoob\Pushwoosh\Model\Notification\IOS` class
 * Remove a duplicated method in the `Gomoob\Pushwoosh\Model\Request\UnregistereDeviceRequest` class

## 0.1.0-alpha2 (2014-06-13)
 * Second alpha release
 * Add a Contributing section in the README.md file
 * Improves documentation
 * Add a develop branch to the project
 * Add several missing methods to the `Gomoob\Pushwoosh\Model\Notification\Notification` class
 * Add a `Gomoob\Pushwoosh\Model\Notification\NotificationTest` unit test class
 * Prepare test cases for not implemented request objects

## 0.1.0-alpha1 (2014-05-25)
 * First alpha release which implements the following Pushwoosh REST Web Services : 
   * `/createMessage`
   * `/registerDevice`
   * `/setTags`
   * `/unregisterDevice`
