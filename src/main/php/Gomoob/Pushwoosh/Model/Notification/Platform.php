<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents a value for link minimization.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class Platform
{
    /**
     * @const string iOS
     */
    const IOS = 1;
    /**
     * @const string BlackBerry
     */
    const BLACKBERRY = 2;
    /**
     * @const string Android
     */
    const ANDROID = 3;
    /**
     * @const string Nokia ASHA
     */
    const NOKIA_ASHA = 4;
    /**
     * @const string Windows Phone 7
     */
    const WINDOWS_PHONE_7 = 5;
    /**
     * @const string Mac OS X
     */
    const MAC_OS_X = 7;
    /**
     * @const string Windows 8
     */
    const WINDOWS_8 = 8;
    /**
     * @const string Amazon
     */
    const AMAZON = 9;
    /**
     * @const string Safari
     */
    const SAFARI = 10;
    /**
     * @const string Chrome
     */
    const CHROME = 11;
    /**
     * @const string Firefox
     */
    const FIREFOX = 12;

    /**
     * The value of the platform, this can be equal to :
     *  - 1 : iOS
     *  - 2 : BlackBerry
     *  - 3 : Android
     *  - 4 : Nokia ASHA
     *  - 5 : Windows Phone 7
     *  - 7 : Mac OS X
     *  - 8 : Windows 8
     *  - 9 : Amazon
     *  - 10: Safari
     *  - 11: Chrome
     *  - 12: Firefox
     *
     * @var int
     */
    private $value;

    /**
     * Create a new <code>Platform</code> instance.
     *
     * @param int $value the value of the platform.
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get a <code>Platform</code> instance for Amazon.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function amazon()
    {
        return new Platform(self::AMAZON);
    }

    /**
     * Get a <code>Platform</code> instance for Android.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function android()
    {
        return new Platform(self::ANDROID);
    }

    /**
     * Get a <code>Platform</code> instance for BlackBerry.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function blackBerry()
    {
        return new Platform(self::BLACKBERRY);
    }
    
    /**
     * Get a <code>Platform</code> instance for Chrome.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function chrome()
    {
        return new Platform(self::CHROME);
    }

    /**
     * Get a <code>Platform</code> instance for iOS.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function iOS()
    {
        return new Platform(self::IOS);
    }

    /**
     * Get a <code>Platform</code> instance for Mac OS X.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function macOSX()
    {
        return new Platform(self::MAC_OS_X);
    }

    /**
     * Get a <code>Platform</code> instance for Nokia ASHA.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function nokia()
    {
        return new Platform(self::NOKIA_ASHA);
    }

    /**
     * Get a <code>Platform</code> instance for Safari.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function safari()
    {
        return new Platform(self::SAFARI);
    }

    /**
     * Get a <code>Platform</code> instance for Windows Phone 7.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function windowsPhone7()
    {
        return new Platform(self::WINDOWS_PHONE_7);
    }

    /**
     * Get a <code>Platform</code> instance for Windows 8.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function windows8()
    {
        return new Platform(self::WINDOWS_8);
    }

    /**
     * Get a <code>Platform</code> instance for Firefox.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\Platform the created <code>Platform</code> instance.
     */
    public static function firefox()
    {
        return new Platform(self::FIREFOX);
    }

    /**
     * Gets the value of the plateform, this can be equal to :
     *  - 1 : iOS
     *  - 2 : BlackBerry
     *  - 3 : Android
     *  - 4 : Nokia ASHA
     *  - 5 : Windows Phone 7
     *  - 7 : Mac OS X
     *  - 8 : Windows 8
     *  - 9 : Amazon
     *  - 10: Safari
     *  - 11: Chrome
     *  - 12: Firefox
     *
     * @return int the value of the platform.
     */
    public function getValue()
    {
        return $this->value;
    }
}
