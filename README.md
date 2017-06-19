# php-pushwoosh

> A PHP Library to easily send push notifications with the Pushwoosh REST Web Services.

[![Total Downloads](https://img.shields.io/packagist/dt/gomoob/php-pushwoosh.svg?style=flat-square)](https://packagist.org/packages/gomoob/php-pushwoosh) 
[![Latest Stable Version](https://img.shields.io/packagist/v/gomoob/php-pushwoosh.svg?style=flat-square)](https://packagist.org/packages/gomoob/php-pushwoosh) 
[![Build Status](https://img.shields.io/travis/gomoob/php-pushwoosh.svg?style=flat-square)](https://travis-ci.org/gomoob/php-pushwoosh)
[![Coverage](https://img.shields.io/coveralls/gomoob/php-pushwoosh.svg?style=flat-square)](https://coveralls.io/r/gomoob/php-pushwoosh?branch=master)
[![Code Climate](https://img.shields.io/codeclimate/github/gomoob/php-pushwoosh.svg?style=flat-square)](https://codeclimate.com/github/gomoob/php-pushwoosh)
[![License](https://img.shields.io/packagist/l/gomoob/php-pushwoosh.svg?style=flat-square)](https://packagist.org/packages/gomoob/php-pushwoosh)

## First sample, creating a Pushwoosh message

```php
// Create a Pushwoosh client
$pushwoosh = Pushwoosh::create()
    ->setApplication('XXXX-XXX')
    ->setAuth('xxxxxxxx');

// Create a request for the '/createMessage' Web Service
$request = CreateMessageRequest::create()
    ->addNotification(Notification::create()->setContent('Hello Jean !'));

// Call the REST Web Service
$response = $pushwoosh->createMessage($request);

// Check if its ok
if($response->isOk()) {
    print 'Great, my message has been sent !';
} else {
    print 'Oups, the sent failed :-('; 
    print 'Status code : ' . $response->getStatusCode();
    print 'Status message : ' . $response->getStatusMessage();
}
```

Easy, isn't it ? 

## Documentation

 * [Documentation](http://gomoob.github.io/php-pushwoosh) 
 * [How to Contribute](http://gomoob.github.io/php-pushwoosh/contribute.html)

## Framework Integrations
 - **Laravel** - https://github.com/schimpanz/Laravel-Pushwoosh
 - **Symfony 2** - https://github.com/Prezent/pushwoosh-bundle

If you have integrated php-pushwoosh into a popular PHP framework let us know !

## About Gomoob

At [Gomoob](https://www.gomoob.com) we build high quality software with awesome Open Source frameworks everyday. Would 
you like to start your next project with us? That's great! Give us a call or send us an email and we will get back to 
you as soon as possible !

You can contact us by email at [contact@gomoob.com](mailto:contact@gomoob.com) or by phone number 
[(+33) 6 85 12 81 26](tel:+33685128126) or [(+33) 6 28 35 04 49](tel:+33685128126).

Visit also http://gomoob.github.io to discover more Open Source softwares we develop.
