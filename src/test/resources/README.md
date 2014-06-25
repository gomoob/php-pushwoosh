The `pushwoosh-test-properties.json` file MUST NOT be commited to the GIT repository because this file contains 
authentication informations to connect to a Pushwoosh account.

If you want to execute the unit / integration tests you have to create a `pushwoosh-test-properties.json` file with the 
following informations : 
```
{
    "application" : "XXXX-XXXX",
    "auth" : "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```

It is advice to create a Pushwoosh application which is dedicated to the GoMoob PHP Pushwoosh library and which is not 
used by an other application or project (otherwise some integration tests could fail).
 