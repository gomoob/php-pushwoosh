<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Android</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group AndroidTest
 */
class AndroidTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(Android::create());

    }

    /**
	 * Test method for the <code>#getBanner()</code> and <code>setBanner($banner)</code> functions.
	 */
    public function testGetSetBanner()
    {
        $android = new Android();
        $this->assertSame($android, $android->setBanner('http://example.com/banner.png'));
        $this->assertEquals('http://example.com/banner.png', $android->getBanner());
    }

    /**
	 * Test method for the <code>#getCustomIcon()</code> and <code>#setCustomIcon($icon)</code> functions.
	 */
    public function testGetSetCustomIcon()
    {
        $android = new Android();
        $this->assertSame($android, $android->setCustomIcon('http://example.com/image.png'));
        $this->assertEquals('http://example.com/image.png', $android->getCustomIcon());
    }

    /**
	 * Test method for the <code>#getGcmTtl()</code> and <code>#setGcmTtl($gcmTtl)</code> functions.
	 */
    public function testGetSetGcmTtl()
    {
        $android = new Android();
        $this->assertSame($android, $android->setGcmTtl(3600));
        $this->assertEquals(3600, $android->getGcmTtl());
    }

    /**
	 * Test method for the <code>#getHeader()</code> and <code>#setHeader($header)</code> functions.
	 */
    public function testGetSetHeader()
    {
        $android = new Android();
        $this->assertSame($android, $android->setHeader('Header'));
        $this->assertEquals('Header', $android->getHeader());
    }

    /**
	 * Test method for the <code>#getIcon()</code> and <code>#setIcon($icon)</code> functions.
	 */
    public function testGetSetIcon()
    {
        $android = new Android();
        $this->assertSame($android, $android->setIcon('icon'));
        $this->assertEquals('icon', $android->getIcon());
    }

    /**
	 * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
	 */
    public function testGetSetRootParams()
    {
        $android = new Android();
        $this->assertSame($android, $android->setRootParams(array('key' => 'value')));
        $this->assertEquals(array('key' => 'value'), $android->getRootParams());
    }

    /**
	 * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
	 */
    public function testGetSetSound()
    {
        $android = new Android();
        $this->assertSame($android, $android->setSound('push.mp3'));
        $this->assertEquals('push.mp3', $android->getSound());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
        $array = Android::create()
            ->setBanner('http://example.com/banner.png')
            ->setCustomIcon('http://example.com/image.png')
            ->setGcmTtl(3600)
            ->setHeader('Header')
            ->setIcon('icon')
            ->setRootParams(array('key' => 'value'))
            ->setSound('push.mp3')
            ->toJSON();

        $this->assertCount(7, $array);
        $this->assertEquals('http://example.com/banner.png', $array['android_banner']);
        $this->assertEquals('http://example.com/image.png', $array['android_custom_icon']);
        $this->assertEquals(3600, $array['android_gcm_ttl']);
        $this->assertEquals('Header', $array['android_header']);
        $this->assertEquals('icon', $array['android_icon']);
        $this->assertEquals(array('key' => 'value'), $array['android_root_params']);
        $this->assertEquals('push.mp3', $array['android_sound']);

    }
}
