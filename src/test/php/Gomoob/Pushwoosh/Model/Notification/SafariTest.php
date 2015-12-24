<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Test case used to test the <code>Safari</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  SafariTest
 */
class SafariTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test method for the <code>#create()</code> function;
     */
    public function testCreate()
    {
        $this->assertNotNull(Safari::create());

    }

    /**
     * Test method for the <code>#getAction()</code> and <code>#setAction($action)</code> functions.
     */
    public function testGetSetAction()
    {
        $safari = new Safari();
        $this->assertSame($safari, $safari->setAction('Click here'));
        $this->assertSame('Click here', $safari->getAction());
    }

    /**
     * Test method for the <code>#getTitle()</code> and <code>#setTitle($title)</code> functions.
     */
    public function testGetSetTitle()
    {
        $safari = new Safari();
        $this->assertSame($safari, $safari->setTitle('Title'));
        $this->assertSame('Title', $safari->getTitle());
    }

    /**
     * Test method for the <code>#getTtl()</code> and <code>#setTtl($ttl)</code> functions.
     */
    public function testGetSetTtl()
    {
        $safari = new Safari();
        $this->assertSame($safari, $safari->setTtl(3600));
        $this->assertSame(3600, $safari->getTtl());
    }

    /**
     * Test method for the <code>#getUrlArgs()</code> and <code>#setUrlArgs($urlArgs)</code> functions.
     */
    public function testGetSetUrlArgs()
    {
        $safari = new Safari();
        $this->assertSame($safari, $safari->setUrlArgs(array('firstArgument', 'secondArgument')));
        $this->assertSame(array('firstArgument', 'secondArgument'), $safari->getUrlArgs());
    }

    /**
     * Test method for the <code>#toJSON()</code> function.
     */
    public function testToJSON()
    {
        $array = Safari::create()
            ->setAction('Click here')
            ->setTitle('Title')
            ->setTtl(3600)
            ->setUrlArgs(array('firstArgument', 'secondArgument'))
            ->toJSON();

        $this->assertCount(4, $array);
        $this->assertSame('Click here', $array['safari_action']);
        $this->assertSame('Title', $array['safari_title']);
        $this->assertSame(3600, $array['safari_ttl']);
        $this->assertSame(array('firstArgument', 'secondArgument'), $array['safari_url_args']);

    }
}
