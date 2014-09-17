<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Platform</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group PlatformTest
 */
class PlatformTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#amazon()</code> function.
	 */
    public function testAmazon()
    {
        $this->assertEquals(9, Platform::amazon()->getValue());

    }

    /**
	 * Test method for the <code>#android()</code> function.
	 */
    public function testAndroid()
    {
        $this->assertEquals(3, Platform::android()->getValue());

    }

    /**
	 * Test method for the <code>#blackBerry()</code> function.
	 */
    public function testBlackBerry()
    {
        $this->assertEquals(2, Platform::blackBerry()->getValue());

    }

    /**
	 * Test method for the <code>#iOS()</code> function.
	 */
    public function testIOS()
    {
        $this->assertEquals(1, Platform::iOS()->getValue());

    }

    /**
	 * Test method for the <code>#macOSX</code> function.
	 */
    public function testMacOSX()
    {
        $this->assertEquals(7, Platform::maxOSX()->getValue());

    }

    /**
	 * Test method for the <code>#nokia()</code> function.
	 */
    public function testNokia()
    {
        $this->assertEquals(4, Platform::nokia()->getValue());

    }

    /**
	 * Test method for the <code>#safari</code> function.
	 */
    public function testSafari()
    {
        $this->assertEquals(10, Platform::safari()->getValue());

    }

    /**
	 * Test method for the <code>#windowsPhone7</code> function.
	 */
    public function testWindowsPhone7()
    {
        $this->assertEquals(5, Platform::windowsPhone7()->getValue());

    }

    /**
	 * Test method for the <code>#windows8</code> function.
	 */
    public function testWindows8()
    {
        $this->assertEquals(8, Platform::windows8()->getValue());

    }
}
