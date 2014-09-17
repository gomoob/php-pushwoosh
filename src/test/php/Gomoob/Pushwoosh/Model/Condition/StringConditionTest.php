<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Test case used to test the <code>StringCondition</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group StringonditionTest
 */
class StringConditionTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#eq($value)</code> function.
	 */
    public function testEq()
    {
        $stringCondition = StringCondition::create('A_TAG')->eq('VALUE');
        $array = $stringCondition->toJSON();

        $this->assertCount(3, $array);

        $this->assertEquals('A_TAG', $array[0]);
        $this->assertEquals('A_TAG', $stringCondition->getTagName());

        $this->assertEquals('EQ', $array[1]);
        $this->assertEquals('EQ', $stringCondition->getOperator());

        $this->assertEquals('VALUE', $array[2]);
        $this->assertEquals('VALUE', $stringCondition->getOperand());
    }
}
