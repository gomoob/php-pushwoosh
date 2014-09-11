<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Test case used to test the <code>SetBadgeRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group SetBadgeRequestTest
 */
class SetBadgeRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $setBadgeRequest = SetBadgeRequest::create();

        $this->assertNotNull($setBadgeRequest);

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $setBadgeRequest = new SetBadgeRequest();
        $this->assertNull($setBadgeRequest->getApplication());
        $setBadgeRequest->setApplication('APPLICATION');
        $this->assertEquals('APPLICATION', $setBadgeRequest->getApplication());
    }

    /**
     * Test method for the <tt>getBadge()</tt> and <tt>setBadge($badge)</tt> functions.
     */
    public function testGetSetBadge()
    {
        $setBadgeRequest = new SetBadgeRequest();
        $this->assertNull($setBadgeRequest->getBadge());
        $setBadgeRequest->setBadge(5);
        $this->assertEquals(5, $setBadgeRequest->getBadge());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $setBadgeRequest = new SetBadgeRequest();
        $this->assertNull($setBadgeRequest->getHwid());
        $setBadgeRequest->setHwid('HWID');
        $this->assertEquals('HWID', $setBadgeRequest->getHwid());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $setBadgeRequest = new SetBadgeRequest();

        // Test without the 'application' parameter set
        try {

            $setBadgeRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'badge' parameter set
        $setBadgeRequest->setApplication('APPLICATION');
        try {

            $setBadgeRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hwid' parameter set
        $setBadgeRequest->setBadge(5);
        try {

            $setBadgeRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        $setBadgeRequest->setHwid('HWID');

        // Test with valid values
        $array = $setBadgeRequest->toJSON();
        $this->assertEquals('APPLICATION', $array['application']);
        $this->assertEquals(5, $array['badge']);
        $this->assertEquals('HWID', $array['hwid']);

    }
}
