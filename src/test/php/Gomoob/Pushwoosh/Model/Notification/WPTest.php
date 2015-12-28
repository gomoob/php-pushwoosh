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
 * @group  WPTest
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
        $wp = new WP();
        $this->assertSame($wp, $wp->setBackbackground('/Resources/Green.jpg'));
        $this->assertSame('/Resources/Green.jpg', $wp->getBackbackground());
    }

    /**
     * Test method for the <code>#getBackcontent()</code> and <code>#setBackcontent($backcontent)</code> functions.
     */
    public function testGetSetBackcontent()
    {
        $wp = new WP();
        $this->assertSame($wp, $wp->setBackcontent('back content'));
        $this->assertSame('back content', $wp->getBackcontent());
    }

    /**
     * Test method for the <code>#getBackground()</code> and <code>#setBackground($background)</code> functions.
     */
    public function testGetSetBackground()
    {
        $wp = new WP();
        $this->assertSame($wp, $wp->setBackground('/Resources/Red.jpg'));
        $this->assertSame('/Resources/Red.jpg', $wp->getBackground());
    }

    /**
     * Test method for the <code>#getTitle()</code> and <code>#setTitle($title)</code> functions.
     */
    public function testGetSetBacktitle()
    {
        $wp = new WP();
        $this->assertSame($wp, $wp->setBacktitle('back title'));
        $this->assertSame('back title', $wp->getBacktitle());
    }

    /**
     * Test method for the <code>#getCount()</code> and <code>#setCount($count)</code> functions.
     */
    public function testGetSetCount()
    {
        $wp = new WP();
        $this->assertSame($wp, $wp->setCount(3));
        $this->assertSame(3, $wp->getCount());
    }

    /**
     * Test method for the <code>#getType()</code> and <code>#setType()</code> functions.
     */
    public function testGetSetType()
    {
        $wp = new WP();
        $this->assertSame($wp, $wp->setType('Tile'));
        $this->assertSame('Tile', $wp->getType());
    }

    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = WP::create()
            ->setBackbackground('/Resources/Green.jpg')
            ->setBackcontent('back content')
            ->setBackground('/Resources/Red.jpg')
            ->setBacktitle('back title')
            ->setCount(3)
            ->setType('Tile')
            ->jsonSerialize();

        $this->assertCount(6, $array);
        $this->assertSame('/Resources/Green.jpg', $array['wp_backbackground']);
        $this->assertSame('back content', $array['wp_backcontent']);
        $this->assertSame('/Resources/Red.jpg', $array['wp_background']);
        $this->assertSame('back title', $array['wp_backtitle']);
        $this->assertSame(3, $array['wp_count']);
        $this->assertSame('Tile', $array['wp_type']);
    }
}
