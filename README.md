# GoMoob Pushwoosh PHP Library

> A PHP Library to easily work with the Pushwoosh REST Web Services.

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

The easiest way to install the library is to use [composer](https://getcomposer.org/) and define the following dependency inside your composer.json file : 
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

Calls to the Pushwoosh REST Web Services are done using a Pushwoosh client class. Then you call a method by using a request object, you receive a response object with a success or the detail of an error.

Each request sent to the Pushwoob REST Web Services is represented by a `xxxRequest` object / class defined in the `Gomoob\Pushwoosh\Model\Request` namespace. 

Each response returned by the Pushwoosh REST Web Services is represented by a `xxxResponse` object / class defined in the `Gomoob\Pushwoosh\Model\Response` namespace.

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

Setting the `application` (or `applicationsGroup`) and `auth` parameters in each request can be boring. It is more convenient to keep those informations at one place only. You can set those informations on the Pushwoosh client directly, then the client will use them automatically.

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

### Working with the mock Pushwoosh client

## Pushwoosh clients methods

### Method /createMessage

Offical documentation : [Method /createMessage](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-create)

How to use it :
 * Create a `CreateMessageRequest` object and configure it
 * Call the `createMessage` method with your `CreateMessageRequest` object
 * Check if everything is good using the returned `CreateMessageResponse` object

Sample code : 
```php
$createMessageRequest = CreateMessageRequest::create()
    -> addNotification(Notification::create() -> setContent('Hello World'!));
    
$createMessageResponse = $pushwoosh -> createMessage($createMessageRequest);

if($createMessageResponse -> isOk() {

    print 'Great, message sent !';

} else {

    print 'It is not working :-(';
    print 'Status code : ' . $createMessageResponse -> getStatusCode();
    print 'Status message : ' . $createMessageResponse -> getStatusMessage();

}
```

Define multiple notifications : 
```php
$createMessageRequest = CreateMessageRequest::create()
    -> addNotification(Notification::create() -> setContent('Hello'))
    -> addNotification(Notification::create() -> setContent('World'))
    -> addNotification(Notification::create() -> setContent('!'));

$pushwoosh -> createMessage($createMessageRequest);
```


### deleteMessage

Offical documentation : [Method /deleteMessage](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-delete)

How to use it :
 * Create a `DeleteMessageRequest` object and configure it
 * Call the `deleteMessage` method with your `DeleteMessageRequest` object
 * Check if everything is good using the returned `DeleteMessageResponse` object

Sample code : 


### registerDevice

Offical documentation : [Method /registerDevice](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodRegister)

How to use it :
 * Create a `RegisterDeviceRequest` object and configure it
 * Call the `registerDevice` method with your `RegisterDeviceRequest` object
 * Check if everything is good using the returned `RegisterDeviceResponse` object

Sample code : 


### unregisterDevice

Offical documentation : [Method /unregisterDevice](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodUnregister)

How to use it :
 * Create a `UnregisterDeviceRequest` object and configure it
 * Call the `unregisterDevice` method with your `UnregisterDeviceRequest` object
 * Check if everything is good using the returned `UnregisterDeviceResponse` object

Sample code : 


### setTags

Offical documentation : [Method /setTags](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodSetTags)

How to use it :
 * Create a `SetTagsRequest` object and configure it
 * Call the `setTags` method with your `SetTagsRequest` object
 * Check if everything is good using the returned `SetTagsResponse` object

Sample code : 


### setBadge

Offical documentation : [Method /setBadge](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodSetBadge)

How to use it :
 * Create a `SetBadgeRequest` object and configure it
 * Call the `setBadge` method with your `SetBadgeRequest` object
 * Check if everything is good using the returned `SetBadgeResponse` object

Sample code : 


### pushStat

Offical documentation : [Method /pushStat](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodPushStat)

How to use it :
 * Create a `PushStatRequest` object and configure it
 * Call the `pushStat` method with your `PushStatRequest` object
 * Check if everything is good using the returned `PushStatResponse` object

Sample code : 


### getNearestZone

Offical documentation : [Method /getNearestZone](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-MethodGetNearestZone)

How to use it :
 * Create a `GetNearestZoneRequest` object and configure it
 * Call the `getNearestZone` method with your `GetNearestZoneRequest` object
 * Check if everything is good using the returned `GetNearestZoneResponse` object

Sample code : 


## Requests Data Model 

This chapter details each request object used by the API. 

### CreateMessageRequest

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

### DeleteMessageRequest

The `DeleteMessageRequest` class is used to call the `deleteMessage` Pushwoosh client method.

### RegisterDeviceRequest

The `RegisterDeviceRequest` class is used to call the `registerDevice` Pushwoosh client method.

### UnregisterDeviceRequest

The `UnregisterDeviceRequest` class is used to call the `unregisterDevice` Pushwoosh client method.

### SetTagsRequest

The `SetTagsRequest` class is used to call the `setTags` Pushwoosh client method.

### SetBadgeRequest

The `SetBadgeRequest` class is used to call the `setBadge` Pushwoosh client method.

### PushStatRequest

The `PushStatRequest` class is used to call the `pushStat` Pushwoosh client method.

### GetNearestZoneRequest

The `GetNearestZoneRequest` class is used to call the `getNearestZone` Pushwoosh client method.

## Responses Data Model

# FAQ

## SSL error 
See http://curl.haxx.se/docs/sslcerts.html

# Release history

## 0.1.0 (2014-05-19)
 * First release
