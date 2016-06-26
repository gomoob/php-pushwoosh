<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Firefox</code> class.
 *
 * @author Oleg Bespalov <o.bespalov@rambler-co.ru>
 * @group  FirefoxTest
 */
class FirefoxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method for the <code>#create()</code> function;
     */
    public function testCreate()
    {
        $this->assertNotNull(Firefox::create());
    }

    /**
     * Test method for the <code>#getIcon()</code> and <code>#setIcon($icon)</code> functions.
     */
    public function testGetSetIcon()
    {
        $firefox = new Firefox();
        $this->assertSame($firefox, $firefox->setIcon('icon'));
        $this->assertSame('icon', $firefox->getIcon());
    }

    /**
     * Test method for the <code>#getTitle()</code> and <code>#setTitle($title)</code> functions.
     */
    public function testGetSetTitle()
    {
        $firefox = new Firefox();
        $this->assertSame($firefox, $firefox->setTitle('Title'));
        $this->assertSame('Title', $firefox->getTitle());
    }

    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = Firefox::create()
            ->setIcon('icon')
            ->setTitle('Title')
            ->jsonSerialize();

        $this->assertCount(2, $array);
        $this->assertSame('icon', $array['firefox_icon']);
        $this->assertSame('Title', $array['firefox_title']);
    }
}
