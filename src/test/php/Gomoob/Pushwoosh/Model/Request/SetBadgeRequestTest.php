<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the <code>SetBadgeRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  SetBadgeRequestTest
 */
class SetBadgeRequestTest extends TestCase
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
        $this->assertSame('APPLICATION', $setBadgeRequest->getApplication());
    }

    /**
     * Test method for the `getAuth()` and `setAuth($auth)` functions.
     */
    public function testGetSetAuth()
    {
        $setBadgeRequest = new SetBadgeRequest();

        // Gets for `getAuth()`
        try {
            $setBadgeRequest->getAuth();
            $this->fail('Must have throw a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame('This request does not support the \'auth\' parameter !', $pex->getMessage());
        }

        // Gets for `getAuth()`
        try {
            $setBadgeRequest->setAuth('XXXX');
            $this->fail('Must have throw a PushwooshException !');
        } catch (PushwooshException $pex) {
            $this->assertSame('This request does not support the \'auth\' parameter !', $pex->getMessage());
        }
    }

    /**
     * Test method for the <tt>getBadge()</tt> and <tt>setBadge($badge)</tt> functions.
     */
    public function testGetSetBadge()
    {
        $setBadgeRequest = new SetBadgeRequest();
        $this->assertNull($setBadgeRequest->getBadge());
        $setBadgeRequest->setBadge(5);
        $this->assertSame(5, $setBadgeRequest->getBadge());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $setBadgeRequest = new SetBadgeRequest();
        $this->assertNull($setBadgeRequest->getHwid());
        $setBadgeRequest->setHwid('HWID');
        $this->assertSame('HWID', $setBadgeRequest->getHwid());
    }

    /**
     * Test method for the <tt>jsonSerialize()</tt> function.
     */
    public function testJsonSerialize()
    {
        $setBadgeRequest = new SetBadgeRequest();

        // Test without the 'application' parameter set
        try {
            $setBadgeRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'application\' property is not set !', $pe->getMessage());
        }

        // Test without the 'badge' parameter set
        $setBadgeRequest->setApplication('APPLICATION');
        try {
            $setBadgeRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'badge\' property is not set !', $pe->getMessage());
        }

        // Test without the 'hwid' parameter set
        $setBadgeRequest->setBadge(5);
        try {
            $setBadgeRequest->jsonSerialize();
            $this->fail('Must have thrown a PushwooshException !');
        } catch (PushwooshException $pe) {
            $this->assertSame('The \'hwid\' property is not set !', $pe->getMessage());
        }

        $setBadgeRequest->setHwid('HWID');

        // Test with valid values
        $array = $setBadgeRequest->jsonSerialize();
        $this->assertSame('APPLICATION', $array['application']);
        $this->assertSame(5, $array['badge']);
        $this->assertSame('HWID', $array['hwid']);
    }
}
