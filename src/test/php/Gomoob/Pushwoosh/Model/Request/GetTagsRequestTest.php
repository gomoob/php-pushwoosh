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
 * Test case used to test the <code>GetTagsRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group GetTagsRequestTest
 */
class GetTagsRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $getTagsRequest = GetTagsRequest::create();

        $this->assertNotNull($getTagsRequest);

    }

    /**
     * Test method for the <tt>getApplication()</tt> and <tt>setApplication($application)</tt> functions.
     */
    public function testGetSetApplication()
    {
        $getTagsRequest = new GetTagsRequest();
        $this->assertNull($getTagsRequest->getApplication());
        $getTagsRequest->setApplication('APPLICATION');
        $this->assertEquals('APPLICATION', $getTagsRequest->getApplication());
    }

    /**
     * Test method for the <tt>getAuth()</tt> and <tt>setAuth($hwid)</tt> functions.
     */
    public function testGetSetAuth()
    {
        $getTagsRequest = new GetTagsRequest();
        $this->assertNull($getTagsRequest->getAuth());
        $getTagsRequest->setAuth('XXXXXXXX');
        $this->assertEquals('XXXXXXXX', $getTagsRequest->getAuth());
    }

    /**
     * Test method for the <tt>getHwid()</tt> and <tt>setHwid($hwid)</tt> functions.
     */
    public function testGetSetHwid()
    {
        $getTagsRequest = new GetTagsRequest();
        $this->assertNull($getTagsRequest->getHwid());
        $getTagsRequest->setHwid('HWID');
        $this->assertEquals('HWID', $getTagsRequest->getHwid());
    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        $getTagsRequest = new GetTagsRequest();

        // Test without the 'application' parameter set
        try {

            $getTagsRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'auth' parameter set
        $getTagsRequest->setApplication('APPLICATION');
        try {

            $getTagsRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        // Test without the 'hwid' parameter set
        $getTagsRequest->setAuth('XXXXXXXX');
        try {

            $getTagsRequest->toJSON();
            $this->fail('Must have thrown a PushwooshException !');

        } catch (PushwooshException $pe) {

            // Expected

        }

        $getTagsRequest->setHwid('HWID');

        // Test with valid values
        $array = $getTagsRequest->toJSON();
        $this->assertEquals('APPLICATION', $array['application']);
        $this->assertEquals('XXXXXXXX', $array['auth']);
        $this->assertEquals('HWID', $array['hwid']);

    }
}
