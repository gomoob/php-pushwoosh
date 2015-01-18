<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
define('ROOT_DIRECTORY', getcwd());
define('MAIN_RESOURCES_DIRECTORY', getcwd() . '/src/main/resources');
define('MAIN_SOURCES_DIRECTORY', getcwd() . '/src/main/php');
define('TEST_RESOURCES_DIRECTORY', getcwd() . '/src/test/resources');
define('TEST_SOURCES_DIRECTORY', getcwd() . '/src/test/php');

// Composer autoloading
// @codingStandardsIgnoreStart
if (file_exists('vendor/autoload.php')) {
    include 'vendor/autoload.php';
} else {
    printf('Fail to autoload composer from file \'%s\'', 'vendor/autoload.php');
    exit;
}
// @codingStandardsIgnoreEnd
