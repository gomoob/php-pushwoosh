<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
$currentDirectory = getcwd();

define('ROOT_DIRECTORY', $currentDirectory);
define('MAIN_RESOURCES_DIRECTORY', $currentDirectory . '/src/main/resources');
define('MAIN_SOURCES_DIRECTORY', $currentDirectory . '/src/main/php');
define('TEST_RESOURCES_DIRECTORY', $currentDirectory . '/src/test/resources');
define('TEST_SOURCES_DIRECTORY', $currentDirectory . '/src/test/php');

$mainSourcesDirectory = $currentDirectory . '/src/main/php';
$testSourcesDirectory = $currentDirectory . '/src/test/php';
$composerAutoloadPhp = 'vendor/autoload.php';

printf("Current execution directory is '%s' ...\n", getcwd());
printf("Main sources are located in directory '%s' ...\n", $mainSourcesDirectory);
printf("Test sources are located in directory '%s' ...\n", $testSourcesDirectory);

// Composer autoloading
if (file_exists($composerAutoloadPhp)) {
    $loader = include $composerAutoloadPhp;
} else {
    printf('Fail to autoload composer from file \'%s\'', $composerAutoloadPhp);
    exit;
}

class TestEnvironment
{
    public static function getMainResourcesDirectory()
    {
        return MAIN_RESOURCES_DIRECTORY;

    }

    public static function getMainSourcesDirectory()
    {
        return MAIN_SOURCES_DIRECTORY;

    }

    public static function getTestResourcesDirectory()
    {
        return TEST_RESOURCES_DIRECTORY;

    }

    public static function getTestSourcesDirectory()
    {
        return TEST_SOURCES_DIRECTORY;

    }

}
