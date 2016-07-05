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
 * Test case used to test the <code>ADM</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  ADMTest
 */
class ADMTest extends TestCase
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
        $this->assertSame('http://example.com/banner.png', $aDM->getBanner());
    }

    /**
     * Test method for the <code>#getCustomIcon()</code> and <code>#setCustomIcon($customIcon)</code> functions.
     */
    public function testGetSetCustomIcon()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setCustomIcon('http://example.com/image.png'));
        $this->assertSame('http://example.com/image.png', $aDM->getCustomIcon());
    }

    /**
     * Test method for the <code>#getHeader()</code> and <code>#setHeader($header)</code> functions.
     */
    public function testGetSetHeader()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setHeader('Header'));
        $this->assertSame('Header', $aDM->getHeader());
    }

    /**
     * Test method for the <code>#getIcon()</code> and <code>#setIcon($icon)</code> functions.
     */
    public function testGetSetIcon()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setIcon('icon'));
        $this->assertSame('icon', $aDM->getIcon());
    }
    
    /**
     * Test method for the <code>#getPriority()</code> and <code>#setPriority($priority)</code> functions.
     */
    public function testGetSetPriority()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setPriority(-1));
        $this->assertSame(-1, $aDM->getPriority());
    }

    /**
     * Test method for the <code>#getRootParams()</code> and <code>#setRootParams($rootParams)</code> functions.
     */
    public function testGetSetRootParams()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setRootParams(['key' => 'value']));
        $this->assertSame(['key' => 'value'], $aDM->getRootParams());
    }

    /**
     * Test method for the <code>#getSound()</code> and <code>#setSound($sound)</code> functions.
     */
    public function testGetSetSound()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setSound('push.mp3'));
        $this->assertSame('push.mp3', $aDM->getSound());
    }

    /**
     * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
     */
    public function testGetSetTtl()
    {
        $aDM = new ADM();
        $this->assertSame($aDM, $aDM->setTtl(3600));
        $this->assertSame(3600, $aDM->getTtl());
    }

    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {
        $array = ADM::create()
            ->setBanner('http://example.com/banner.png')
            ->setCustomIcon('http://example.com/image.png')
            ->setHeader('Header')
            ->setIcon('icon')
            ->setPriority(-1)
            ->setRootParams(['key' => 'value'])
            ->setSound('push.mp3')
            ->setTtl(3600)
            ->jsonSerialize();

        $this->assertCount(8, $array);
        $this->assertSame('http://example.com/banner.png', $array['adm_banner']);
        $this->assertSame('http://example.com/image.png', $array['adm_custom_icon']);
        $this->assertSame('Header', $array['adm_header']);
        $this->assertSame('icon', $array['adm_icon']);
        $this->assertSame(-1, $array['adm_priority']);
        $this->assertSame(['key' => 'value'], $array['adm_root_params']);
        $this->assertSame('push.mp3', $array['adm_sound']);
        $this->assertSame(3600, $array['adm_ttl']);
    }
}
