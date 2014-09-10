<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Test case used to test the <code>SetTagsRequest</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group SetTagsRequestTest
 */
class SetTagsRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <tt>create()</tt> function.
	 */
    public function testCreate()
    {
        $setTagsRequest = SetTagsRequest::create();

        $this->assertNotNull($setTagsRequest);

    }

    /**
	 * Test method for the <tt>toJSON()</tt> function.
	 */
    public function testToJSON()
    {
        // TODO

    }
}
