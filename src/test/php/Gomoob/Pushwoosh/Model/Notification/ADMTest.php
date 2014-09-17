<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>ADM</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group ADMTest
 */
class ADMTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#create()</code> function;
	 */
    public function testCreate()
    {
        $this->assertNotNull(ADM::create());

    }

    /**
	 * Test method for the <code>#getBanner()</code> and <code>#setBanner($banner)</code> functions.
	 */
    public function testGetSetBanner()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setBanner('http://example.com/banner.png'));
        $this->assertEquals('http://example.com/banner.png', $aDM->getBanner());
    }

    /**
	 * Test method for the <code>#getCustomIcon()</code> and <code>#setCustomIcon($customIcon)</code> functions.
	 */
    public function testGetSetCustomIcon()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setCustomIcon('http://example.com/image.png'));
        $this->assertEquals('http://example.com/image.png', $aDM->getCustomIcon());
    }

    /**
	 * Test method for the <code>#getHeader()</code> and <code>#setHeader($header)</code> functions.
	 */
    public function testGetSetHeader()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setHeader('Header'));
        $this->assertEquals('Header', $aDM->getHeader());
    }

    /**
	 * Test method for the <code>#getIcon()</code> and <code>#setIcon($icon)</code> functions.
	 */
    public function testGetSetIcon()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setIcon('icon'));
        $this->assertEquals('icon', $aDM->getIcon());
    }

    /**
	 * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
	 */
    public function testGetSetRootParams()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setRootParams(array('key' => 'value')));
        $this->assertEquals(array('key' => 'value'), $aDM->getRootParams());
    }

    /**
	 * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
	 */
    public function testGetSetSound()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setSound('push.mp3'));
        $this->assertEquals('push.mp3', $aDM->getSound());
    }

    /**
	 * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
	 */
    public function testGetSetTtl()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setTtl(3600));
        $this->assertEquals(3600, $aDM->getTtl());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
        $array = ADM::create()
            ->setBanner('http://example.com/banner.png')
            ->setCustomIcon('http://example.com/image.png')
            ->setHeader('Header')
            ->setIcon('icon')
            ->setRootParams(array('key' => 'value'))
            ->setSound('push.mp3')
            ->setTtl(3600)
            ->toJSON();

        $this->assertCount(7, $array);
        $this->assertEquals('http://example.com/banner.png', $array['adm_banner']);
        $this->assertEquals('http://example.com/image.png', $array['adm_custom_icon']);
        $this->assertEquals('Header', $array['adm_header']);
        $this->assertEquals('icon', $array['adm_icon']);
        $this->assertEquals(array('key' => 'value'), $array['adm_root_params']);
        $this->assertEquals('push.mp3', $array['adm_sound']);
        $this->assertEquals(3600, $array['adm_ttl']);

    }
}
