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
 * @group  IOSTest
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
        $this->assertSame(5, $iOS->getBadges());
    }
    
    /**
     * Test method for the <code>#getCategoryId()</code> and <code>#setCategoryId($categoryId)</code> functions.
     */
    public function testGetSetCategoryId()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setCategoryId('1'));
        $this->assertSame('1', $iOS->getCategoryId());
    }

    /**
     * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
     */
    public function testGetSetRootParams()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setRootParams(['aps' => ['content-available' => '1']]));
        $this->assertSame(['aps' => ['content-available' => '1']], $iOS->getRootParams());
    }

    /**
     * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
     */
    public function testGetSetSound()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setSound('sound file.wav'));
        $this->assertSame('sound file.wav', $iOS->getSound());
    }

    /**
     * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
     */
    public function testGetSetTtl()
    {
        $iOS = new IOS();
        $this->assertSame($iOS, $iOS->setTtl(3600));
        $this->assertSame(3600, $iOS->getTtl());
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
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = IOS::create()
            ->setApnsTrimContent(true)
            ->setBadges(5)
            ->setCategoryId('1')
            ->setRootParams(['aps' => ['content-available' => '1']])
            ->setSound('sound file.wav')
            ->setTtl(3600)
            ->setTrimContent(true)
            ->jsonSerialize();

        $this->assertCount(7, $array);
        $this->assertSame(1, $array['apns_trim_content']);
        $this->assertSame(5, $array['ios_badges']);
        $this->assertSame('1', $array['ios_category_id']);
        $this->assertSame(['aps' => ['content-available' => '1']], $array['ios_root_params']);
        $this->assertSame('sound file.wav', $array['ios_sound']);
        $this->assertSame(3600, $array['ios_ttl']);
        $this->assertSame(1, $array['ios_trim_content']);
    }
}
