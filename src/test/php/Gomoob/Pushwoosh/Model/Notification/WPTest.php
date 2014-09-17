<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>WP</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group WPTest
 */
class WPTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(WP::create());

    }

    /**
	 * Test method for the <code>#getBackbackground()</code> and <code>#setBackbackground($backbackground)</code>
	 * functions.
	 */
    public function testGetSetBackbackground()
    {
    }

    /**
	 * Test method for the <code>#getBackground()</code> and <code>#setBackground($background)</code> functions.
	 */
    public function testGetSetBackground()
    {
    }

    /**
	 * Test method for the <code>#getTitle()</code> and <code>#setTitle($title)</code> functions.
	 */
    public function testGetSetBacktitle()
    {
    }

    /**
	 * Test method for the <code>#getCount()</code> and <code>#setCount($count)</code> functions.
	 */
    public function testGetSetCount()
    {
    }

    /**
	 * Test method for the <code>#getType()</code> and <code>#setType()</code> functions.
	 */
    public function testGetSetType()
    {
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
    }
}
