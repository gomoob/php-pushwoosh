# `/createMessage`

## Offical documentation

[Method /createMessage](http://www.pushwoosh.com/programming-push-notification/pushwoosh-push-notification-remote-api/#PushserviceAPI-Method-messages-create)

## How to use it

 * Create a `CreateMessageRequest` object and configure it
 * Call the `createMessage` method with your `CreateMessageRequest` object
 * Check if everything is good using the returned `CreateMessageResponse` object

## Samples

### Hello World

```php
use \Gomoob\Pushwoosh\Model\Notification\Notification;
use \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

$createMessageRequest = CreateMessageRequest::create()
    ->addNotification(Notification::create()->setContent('Hello World'!));

$createMessageResponse = $pushwooshClient->createMessage($createMessageRequest);

if($createMessageResponse->isOk() {

    print 'Great, message sent !';

} else {

    print 'It is not working :-(';
    print 'Status code : ' . $createMessageResponse->getStatusCode();
    print 'Status message : ' . $createMessageResponse->getStatusMessage();

}
```

### Define multiple notifications 

```php
$createMessageRequest = CreateMessageRequest::create()
    -> addNotification(Notification::create()->setContent('Hello'))
    -> addNotification(Notification::create()->setContent('World'))
    -> addNotification(Notification::create()->setContent('!'));

$pushwooshClient->createMessage($createMessageRequest);
```

### Attach additional data

```php
$notification = Notification::create()
    ->setDataParameter('data_parameter_1', 'data_parameter_1_value')
    ->setDataParameter('data_parameter_2', 'data_parameter_2_value');

$pushwooshClient->createMessage(CreateMessageRequest::create()->addNotification($notification));
```

### Send to only specific devices

```php
$notification = Notification::create()
    ->addDevice('DEVICE_TOKEN_1')
    ->addDevice('DEVICE_TOKEN_2')
    ->addDevice('DEVICE_TOEKN_3');

$pushwooshClient->createMessage(CreateMessageRequest::create()->addNotification($notification));
```
