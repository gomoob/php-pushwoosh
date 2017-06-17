This folder contains a testing Apache Cordova project which can be used to manually test the `php-pushwoosh` library.

# Setup

## Configure identifiers and credentials

In `www/index.js` configure your Google project identifier (i.e the identifier you can find in the "Parameters" / 
"Cloud Messaging" section of your Google Firebase project) and your Pushwoosh application code.

```
//initialize Pushwoosh with projectid: "GOOGLE_PROJECT_ID", appid : "PUSHWOOSH_APP_ID". 
// This will trigger all pending push notifications on start.
pushNotification.onDeviceReady({
    projectid: "XXXXXXXX",
    appid: "XXXXX-XXXXX",
    serviceName: ""
});
```

In the `create-message.php` change the value of the `application` and `auth` parameters to use a valid Pushwoosh
application.

```
// Create a Pushwoosh client
$pushwoosh = Pushwoosh::create()
    ->setApplication('XXXXX-XXXXX')
    ->setAuth('XXXXXXXX');
```

## Starts the testing Cordova application

First install the Apache Cordova command line.

Add support for the Android platform.

```
cordova platform add android
```

Then start the Android emulator with the following command.

```
cordova run android
```

# Test sending of a Push notification

```
php ./create-message.php
```
