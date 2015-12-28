<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Test case used to test the <code>IntCondition</code> class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  IntConditionTest
 */
class IntConditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method for the <code>#between($minValue, $maxValue)</code> function.
     */
    public function testBetween()
    {
        $intCondition = IntCondition::create('A_TAG')->between(10, 100);
        $array = $intCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $intCondition->getTagName());

        $this->assertSame('BETWEEN', $array[1]);
        $this->assertSame('BETWEEN', $intCondition->getOperator());

        $this->assertCount(2, $array[2]);
        $this->assertSame(10, $array[2][0]);
        $this->assertSame(100, $array[2][1]);

        $operand = $intCondition->getOperand();
        $this->assertCount(2, $operand);
        $this->assertSame(10, $operand[0]);
        $this->assertSame(100, $operand[1]);
    }

    /**
     * Test method for the <code>#eq($value)</code> function.
     */
    public function testEq()
    {
        $intCondition = IntCondition::create('A_TAG')->eq(10);
        $array = $intCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $intCondition->getTagName());

        $this->assertSame('EQ', $array[1]);
        $this->assertSame('EQ', $intCondition->getOperator());

        $this->assertSame(10, $array[2]);
        $this->assertSame(10, $intCondition->getOperand());
    }

    /**
     * Test method for the <code>#gte($value)</code> function.
     */
    public function testGte()
    {
        $intCondition = IntCondition::create('A_TAG')->gte(10);
        $array = $intCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $intCondition->getTagName());

        $this->assertSame('GTE', $array[1]);
        $this->assertSame('GTE', $intCondition->getOperator());

        $this->assertSame(10, $array[2]);
        $this->assertSame(10, $intCondition->getOperand());
    }

    /**
     * Test method for the <code>#lte($value)</code> function.
     */
    public function testLte()
    {
        $intCondition = IntCondition::create('A_TAG')->lte(10);
        $array = $intCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $intCondition->getTagName());

        $this->assertSame('LTE', $array[1]);
        $this->assertSame('LTE', $intCondition->getOperator());

        $this->assertSame(10, $array[2]);
        $this->assertSame(10, $intCondition->getOperand());
    }
}
