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
 * Test case used to test the <code>Android</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  AndroidTest
 */
class AndroidTest extends TestCase
{
    /**
     * Test method for the <code>#create()</code> function;
     */
    public function testCreate()
    {
        $this->assertNotNull(Android::create());
    }
    
    /**
     * Test method for the <code>#getBadges()</code> and <code>setBadges($badges)</code> functions.
     */
    public function testGetSetBadges()
    {
        $android = new Android();
        $this->assertSame($android, $android->setBadges(5));
        $this->assertSame(5, $android->getBadges());
    }

    /**
     * Test method for the <code>#getBanner()</code> and <code>setBanner($banner)</code> functions.
     */
    public function testGetSetBanner()
    {
        $android = new Android();
        $this->assertSame($android, $android->setBanner('http://example.com/banner.png'));
        $this->assertSame('http://example.com/banner.png', $android->getBanner());
    }

    /**
     * Test method for the <code>#getCustomIcon()</code> and <code>#setCustomIcon($icon)</code> functions.
     */
    public function testGetSetCustomIcon()
    {
        $android = new Android();
        $this->assertSame($android, $android->setCustomIcon('http://example.com/image.png'));
        $this->assertSame('http://example.com/image.png', $android->getCustomIcon());
    }

    /**
     * Test method for the <code>#getGcmTtl()</code> and <code>#setGcmTtl($gcmTtl)</code> functions.
     */
    public function testGetSetGcmTtl()
    {
        $android = new Android();
        $this->assertSame($android, $android->setGcmTtl(3600));
        $this->assertSame(3600, $android->getGcmTtl());
    }

    /**
     * Test method for the <code>#getHeader()</code> and <code>#setHeader($header)</code> functions.
     */
    public function testGetSetHeader()
    {
        $android = new Android();
        $this->assertSame($android, $android->setHeader('Header'));
        $this->assertSame('Header', $android->getHeader());
    }

    /**
     * Test method for the <code>#getIbc()</code> and <code>#setIbc($ibc)</code> functions.
     */
    public function testGetSetIbc()
    {
        $android = new Android();
        $this->assertSame($android, $android->setIbc('#AA9966'));
        $this->assertSame('#AA9966', $android->getIbc());
    }
    
    /**
     * Test method for the <code>#getIcon()</code> and <code>#setIcon($icon)</code> functions.
     */
    public function testGetSetIcon()
    {
        $android = new Android();
        $this->assertSame($android, $android->setIcon('icon'));
        $this->assertSame('icon', $android->getIcon());
    }

    /**
     * Test method for the <code>#getLed()</code> and <code>#setLed($led)</code> functions.
     */
    public function testGetSetLed()
    {
        $android = new Android();
        $this->assertSame($android, $android->setLed('#4455cc'));
        $this->assertSame('#4455cc', $android->getLed());
    }
    
    /**
     * Test method for the <code>#getPriority()</code> and <code>#setPriority($priority)</code> functions.
     */
    public function testGetSetPriority()
    {
        $android = new Android();
        $this->assertSame($android, $android->setPriority(-1));
        $this->assertSame(-1, $android->getPriority());
    }
    
    /**
     * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
     */
    public function testGetSetRootParams()
    {
        $android = new Android();
        $this->assertSame($android, $android->setRootParams(['key' => 'value']));
        $this->assertSame(['key' => 'value'], $android->getRootParams());
    }

    /**
     * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
     */
    public function testGetSetSound()
    {
        $android = new Android();
        $this->assertSame($android, $android->setSound('push.mp3'));
        $this->assertSame('push.mp3', $android->getSound());
    }

    /**
     * Test method for the <code>#getVibration()</code> and <code>#setVibration($vibration)</code> functions.
     */
    public function testIsSetVibration()
    {
        $android = new Android();
        $this->assertSame($android, $android->setVibration(true));
        $this->assertTrue($android->isVibration());
    }
    
    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = Android::create()
            ->setBanner('http://example.com/banner.png')
            ->setBadges(5)
            ->setCustomIcon('http://example.com/image.png')
            ->setGcmTtl(3600)
            ->setHeader('Header')
            ->setIbc('#AA9966')
            ->setIcon('icon')
            ->setLed('#4455cc')
            ->setPriority(-1)
            ->setRootParams(['key' => 'value'])
            ->setSound('push.mp3')
            ->setVibration(true)
            ->jsonSerialize();

        $this->assertCount(12, $array);
        $this->assertSame('http://example.com/banner.png', $array['android_banner']);
        $this->assertSame(5, $array['android_badges']);
        $this->assertSame('http://example.com/image.png', $array['android_custom_icon']);
        $this->assertSame(3600, $array['android_gcm_ttl']);
        $this->assertSame('Header', $array['android_header']);
        $this->assertSame('#AA9966', $array['android_ibc']);
        $this->assertSame('icon', $array['android_icon']);
        $this->assertSame('#4455cc', $array['android_led']);
        $this->assertSame(-1, $array['android_priority']);
        $this->assertSame(['key' => 'value'], $array['android_root_params']);
        $this->assertSame('push.mp3', $array['android_sound']);
        $this->assertSame(1, $array['android_vibration']);
    }
}
