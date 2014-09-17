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
        $mac = new Mac();
        $this->assertSame($mac, $mac->setBadges(3));
        $this->assertEquals(3, $mac->getBadges());
    }

    /**
	 * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
	 */
    public function testGetSetRootParams()
    {
        $mac = new Mac();
        $this->assertSame($mac, $mac->setRootParams(array('content-available' => '1')));
        $this->assertEquals(array('content-available' => '1'), $mac->getRootParams());
    }

    /**
	 * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
	 */
    public function testGetSetSound()
    {
        $mac = new Mac();
        $this->assertSame($mac, $mac->setSound('sound.caf'));
        $this->assertEquals('sound.caf', $mac->getSound());
    }

    /**
	 * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
	 */
    public function testGetSetTtl()
    {
        $mac = new Mac();
        $this->assertSame($mac, $mac->setTtl(3600));
        $this->assertEquals(3600, $mac->getTtl());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
        $array = Mac::create()
            ->setBadges(3)
            ->setRootParams(array('content-available' => '1'))
            ->setSound('sound.caf')
            ->setTtl(3600)
            ->toJSON();

        $this->assertCount(4, $array);
        $this->assertEquals(3, $array['mac_badges']);
        $this->assertEquals(array('content-available' => '1'), $array['mac_root_params']);
        $this->assertEquals('sound.caf', $array['mac_sound']);
        $this->assertEquals(3600, $array['mac_ttl']);
    }
}
