<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Test case used to test the <code>ListCondition</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group ListConditionTest
 */
class ListConditionTest extends \PHPUnit_Framework_TestCase
{
    /**
	 * Test method for the <code>#in(array $values)</code> function.
	 */
    public function testIn()
    {
        $listCondition = ListCondition::create('A_TAG')->in(array('value1', 'value2', 'value3'));
        $array = $listCondition->toJSON();

        $this->assertCount(3, $array);
        $this->assertEquals('A_TAG', $array[0]);
        $this->assertEquals('A_TAG', $listCondition->getTagName());

        $this->assertEquals('IN', $array[1]);
        $this->assertEquals('IN', $listCondition->getOperator());

        $this->assertCount(3, $array[2]);
        $this->assertEquals('value1', $array[2][0]);
        $this->assertEquals('value2', $array[2][1]);
        $this->assertEquals('value3', $array[2][2]);

        $operand = $listCondition->getOperand();
        $this->assertCount(3, $operand);
        $this->assertEquals('value1', $operand[0]);
        $this->assertEquals('value2', $operand[1]);
        $this->assertEquals('value3', $operand[2]);

    }
}
