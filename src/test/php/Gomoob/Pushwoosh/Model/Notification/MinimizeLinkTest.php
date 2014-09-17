<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>MinimizeLink</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group MinimizeLinkTest
 */
class MinimizeLinkTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#baiduChina()</code> function.
	 */
    public function testBaiduChina()
    {
        $this->assertEquals(3, MinimizeLink::baiduChina()->getValue());

    }

    /**
	 * Test method for the <code>#bitly()</code> function.
	 */
    public function testBitly()
    {
        $this->assertEquals(2, MinimizeLink::bitly()->getValue());

    }

    /**
	 * Test method for the <code>#none()</code> function.
	 */
    public function testNone()
    {
        $this->assertEquals(0, MinimizeLink::none()->getValue());

    }

    /**
	 * Test method for the <code>#google()</code> function.
	 */
    public function testGoogle()
    {
        $this->assertEquals(1, MinimizeLink::google()->getValue());

    }
}
