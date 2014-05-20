# GoMoob Pushwoosh PHP Library

> A PHP Library to easily work with the Pushwoosh REST Web Services.

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

## Methods

### createMessage

The `createMessage` function calls the Pushwoosh `createMessage` REST Web Service describes here : 
http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-create.

To create a message you have to :
 * Create a `CreateMessageRequest` and configure it
 * Call the `createMessage` method with your `CreateMessageRequest`
 * Check if everything is good using the return `CreateMessageResponse` object

Here is a sample code : 
```php
$createMessageRequest = CreateMessageRequest::create()
    -> addNotification(Notification::create() -> setContent('Hello World'!));
    
$createMessageResponse = $pushwoosh -> createMessage($createMessageRequest);

// Something bad happened
if(!$createMessageResponse -> isOk()) {

    print 'It is not working :-(';
    print 'Status code : ' . $createMessageResponse -> getStatusCode();
    print 'Status message : ' . $createMessageResponse -> getStatusMessage();

}

print 'Great, message sent !';
```

You can also easily associate multiple notifications with your request : 
```php
$createMessageRequest = CreateMessageRequest::create()
    -> addNotification(Notification::create() -> setContent('Hello'))
    -> addNotification(Notification::create() -> setContent('World'))
    -> addNotification(Notification::create() -> setContent('!'));

$pushwoosh -> createMessage($createMessageRequest);
```

### deleteMessage

### registerDevice

### unregisterDevice

### setTags

### setbadge

### pushState

### getNearestZone

# FAQ

## SSL error 
See http://curl.haxx.se/docs/sslcerts.html

# Release history

## 0.1.0 (2014-05-19)
 * First release
