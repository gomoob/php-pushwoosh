<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Safari</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group SafariTest
 */
class SafariTest extends \PHPUnit_Framework_TestCase
{

    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(Safari::create());

    }

    /**
	 * Test method for the <code>#getAction()</code> and <code>#setAction($action)</code> functions.
	 */
    public function testGetSetAction()
    {
    }

    /**
	 * Test method for the <code>#getTitle()</code> and <code>#setTitle($title)</code> functions.
	 */
    public function testGetSetTitle()
    {
    }

    /**
	 * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
	 */
    public function testGetSetTtl()
    {
    }

    /**
	 * Test method for the <code>#getUrl()</code> and <code>#setUrl($url)</code> functions.
	 */
    public function testGetSetUrl()
    {
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
    }
}
