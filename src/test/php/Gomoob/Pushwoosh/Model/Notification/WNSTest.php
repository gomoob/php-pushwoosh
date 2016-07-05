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
 * Test case used to test the <code>WNS</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  WNSTest
 */
class WNSTest extends TestCase
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
        $wNS = new WNS();
        $this->assertSame(
            $wNS,
            $wNS->setContent(
                [
                    'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                    'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
                ]
            )
        );
        $this->assertSame(
            [
                'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
            ],
            $wNS->getContent()
        );
    }

    /**
     * Test method for the <code>#getTag()</code> and <code>#setTag($tag)</code> functions.
     */
    public function testGetSetTag()
    {
        $wNS = new WNS();
        $this->assertSame($wNS, $wNS->setTag('myTag'));
        $this->assertSame('myTag', $wNS->getTag());
    }

    /**
     * Test method for the <code>#getType()</code> and <code>#setType($type)</code> functions.
     */
    public function testGetSetType()
    {
        $wNS = new WNS();
        $this->assertSame($wNS, $wNS->setType('Badge'));
        $this->assertSame('Badge', $wNS->getType());
    }

    /**
     * Test method for the <code>#jsonSerialize()</code> function.
     */
    public function testJsonSerialize()
    {

        $array = WNS::create()
            ->setContent(
                [
                    'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                    'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
                ]
            )
            ->setTag('myTag')
            ->setType('Badge')
            ->jsonSerialize();

        $this->assertCount(3, $array);
        $this->assertSame(
            [
                'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
            ],
            $array['wns_content']
        );
        $this->assertSame('myTag', $array['wns_tag']);
        $this->assertSame('Badge', $array['wns_type']);
    }
}
