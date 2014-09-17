<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>IOS</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group IOSTest
 */
class IOSTest extends \PHPUnit_Framework_TestCase
{

    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(IOS::create());

    }

    /**
	 * Test method for the <code>#getBadges()</code> and <code>#setBadges($badges)</code> functions.
	 */
    public function testGetSetBadges()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setBadges(5));
        $this->assertEquals(5, $iOS->getBadges());
    }

    /**
	 * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
	 */
    public function testGetSetRootParams()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setRootParams(array('aps' => array('content-available' => '1'))));
        $this->assertEquals(array('aps' => array('content-available' => '1')), $iOS->getRootParams());
    }

    /**
	 * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
	 */
    public function testGetSetSound()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setSound('sound file.wav'));
        $this->assertEquals('sound file.wav', $iOS->getSound());
    }

    /**
	 * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
	 */
    public function testGetSetTtl()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setTtl(3600));
        $this->assertEquals(3600, $iOS->getTtl());
    }

    /**
     * Test method for the <code>#isApnsTrimContent()</code> and <code>#setApnsTrimContent($apnsTrimContent)</code>
     * functions.
     */
    public function testIsSetApnsTrimContent()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setApnsTrimContent(true));
        $this->assertTrue($iOS->isApnsTrimContent());
    }

    /**
     * Test method for the <code>#isTrimContent()</code> and <code>#setTrimContent($trimContent)</code> functions.
     */
    public function testIsSetTrimContent()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setTrimContent(true));
        $this->assertTrue($iOS->isTrimContent());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
        $array = IOS::create()
            ->setApnsTrimContent(true)
            ->setBadges(5)
            ->setRootParams(array('aps' => array('content-available' => '1')))
            ->setSound('sound file.wav')
            ->setTtl(3600)
            ->setTrimContent(true)
            ->toJSON();

        $this->assertCount(6, $array);
        $this->assertEquals(1, $array['apns_trim_content']);
        $this->assertEquals(5, $array['ios_badges']);
        $this->assertEquals(array('aps' => array('content-available' => '1')), $array['ios_root_params']);
        $this->assertEquals('sound file.wav', $array['ios_sound']);
        $this->assertEquals(3600, $array['ios_ttl']);
        $this->assertEquals(1, $array['ios_trim_content']);

    }
}
