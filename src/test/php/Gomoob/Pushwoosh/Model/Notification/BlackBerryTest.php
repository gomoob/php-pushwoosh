<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>BlackBerry</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group BlackBerryTest
 */
class BlackBerryTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(BlackBerry::create());

    }

    /**
	 * Test method for the <code>#getHeader()</code> and <code>setHeader($header)</code> functions.
	 */
    public function testGetSetBanner()
    {
        $blackBerry = new BlackBerry();
        $this->assertSame($blackBerry, $blackBerry->setHeader('header'));
        $this->assertEquals('header', $blackBerry->getHeader());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
        $array = BlackBerry::create()
            ->setHeader('header')
            ->toJSON();

        $this->assertCount(1, $array);
        $this->assertEquals('header', $array['blackberry_header']);

    }
}
