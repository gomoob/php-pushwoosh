# How to contribute

Your are welcome to contribute to the project by simply posting issues or by providing pull resquests. 

Each time you provide a pull request to fix bugs or propose an evolution you **MUST** adhere to conventions and bests 
practices described here.

## Always create PRs on the `develop` branch

The project is hosted on Github using 2 branches : 

 * `develop` : This branch MUST BE used to create Pull Requests
 * `master` : This branch MUST NEVER BE used directly to create Pull Requests and is maintained by GoMoob

All Pull Requests created using the `master` branch will be rejected.

## Coding conventions

### Formatting

The source code **MUST BE** compliant with the following PSRs : 

 * Basic Coding Standard [PSR-1](http://www.php-fig.org/psr/psr-1) 
 * Coding Style Guide [PSR-2](http://www.php-fig.org/psr/psr-2)

If you provide a Pull Request with source code which is not compliant with those 2 standards the CI build will fail. To 
check if your code is compliant with [PSR-1](http://www.php-fig.org/psr/psr-1) and  
[PSR-2](http://www.php-fig.org/psr/psr-2) a Grunt build command which uses 
[PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) is provided with the project, ALWAYS execute it before 
commiting your changes. 

```
grunt phpcs
```

Sometimes this command will output a lot of errors, an other Grunt command is provided to automatically fix the most 
common errors (this command uses [PHP-CS-Fixer](https://github.com/fabpot/PHP-CS-Fixer)). 

```
grunt php-cs-fixer
```

### Unit tests
The unit tests of the project are executed using PHPUnit, the main code has to be placed inside the `src/main/php` 
directory, the test code has to be placed inside the `src/test/php` directory.

Each class which is tested is named using a clearly defined convention, for example the class 
`Gomoob\Pushwoosh\Model\Request\CreateMessageRequest` which is placed in the `src/main/php` directory is tested using 
a class named `GoMoob\Pushwoosh\Model\Request\CreateMessageRequestTest` placed in the `src/test/php` directory. 

A test class MUST have the same PHP namespace as the class it tests.

## Build scripts

The build scripts of the project are managed using the (Grunt)[http://gruntjs.com/] build tool. 

To execute the builds first install Grunt (which needs (NodeJS)[http://nodejs.org/]) and then pull the Node dependencies 
/ Grunt plugins required by the `Gruntfile` build script.

```
$ npm install
npm WARN package.json gomoob-php-pushwoosh@0.1.0 No repository field.
npm http GET https://registry.npmjs.org/grunt-contrib-copy
npm http GET https://registry.npmjs.org/grunt-phpunit
...
```

Then install (Composer)[https://getcomposer.org/] and executes the following command to pull the PHP dependencies 
required (in fact this is onlye necessary to generate the `vendor/autoload.php` file required for the PHP classes 
autoloading).

```
composer update
Loading composer repositories with package information
Updating dependencies (including require-dev)
Nothing to install or update
Generating autoload files
```

### Default build task

The default build task cleans the temporary `target` directory of the project, executes the unit tests and generates the 
PHPUnit documentation.

```
grunt
```

### Execute the unit tests

```
grunt test
```

### Generate the PHPDocumentor documentation
```
grunt generate-documentation
```
