<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>WNS</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group WNSTest
 */
class WNSTest extends \PHPUnit_Framework_TestCase
{

    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(WNS::create());

    }

    /**
	 * Test method for the <code>#getContent()</code> and <code>#setContent($content)</code> functions.
	 */
    public function testGetSetContent()
    {
    }

    /**
	 * Test method for the <code>#getTag()</code> and <code>#setTag($tag)</code> functions.
	 */
    public function testGetSetTag()
    {
    }

    /**
	 * Test method for the <code>#getType()</code> and <code>#setType($type)</code> functions.
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
