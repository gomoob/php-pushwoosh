<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Mac</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group MacTest
 */
class MacTest extends \PHPUnit_Framework_TestCase
{

    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(Mac::create());

    }

    /**
	 * Test method for the <code>#getBadges()</code> and <code>#setBadges($badges)</code> functions.
	 */
    public function testGetSetBadges()
    {
    }

    /**
	 * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
	 */
    public function testGetSetRootParams()
    {
    }

    /**
	 * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
	 */
    public function testGetSetSound()
    {
    }

    /**
	 * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
	 */
    public function testGetSetTtl()
    {
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
    }
}
