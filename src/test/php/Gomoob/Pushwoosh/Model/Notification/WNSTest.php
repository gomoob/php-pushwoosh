<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>WNS</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group WNSTest
 */
class WNSTest extends \PHPUnit_Framework_TestCase
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
                array(
                    'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                    'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
                )
            )
        );
        $this->assertEquals(
            array(
                'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
            ),
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
        $this->assertEquals('myTag', $wNS->getTag());
    }

    /**
	 * Test method for the <code>#getType()</code> and <code>#setType($type)</code> functions.
	 */
    public function testGetSetType()
    {
        $wNS = new WNS();
        $this->assertSame($wNS, $wNS->setType('Badge'));
        $this->assertEquals('Badge', $wNS->getType());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {

        $array = WNS::create()
            ->setContent(
                array(
                    'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                    'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
                )
            )
            ->setTag('myTag')
            ->setType('Badge')
            ->toJSON();

        $this->assertCount(3, $array);
        $this->assertEquals(
            array(
                'en' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9ImF2YWlsYWJsZSIvPg==',
                'de' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48YmFkZ2UgdmFsdWU9Im5ld01lc3NhZ2UiLz4'
            ),
            $array['wns_content']
        );
        $this->assertEquals('myTag', $array['wns_tag']);
        $this->assertEquals('Badge', $array['wns_type']);

    }
}
