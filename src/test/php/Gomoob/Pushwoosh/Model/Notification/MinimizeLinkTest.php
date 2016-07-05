<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>MinimizeLink</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  MinimizeLinkTest
 */
class MinimizeLinkTest extends TestCase
{
    /**
     * Test method for the <code>#bitly()</code> function.
     */
    public function testBitly()
    {
        $this->assertSame(2, MinimizeLink::bitly()->getValue());
    }

    /**
     * Test method for the <code>#none()</code> function.
     */
    public function testNone()
    {
        $this->assertSame(0, MinimizeLink::none()->getValue());
    }

    /**
     * Test method for the <code>#google()</code> function.
     */
    public function testGoogle()
    {
        $this->assertSame(1, MinimizeLink::google()->getValue());
    }
}
