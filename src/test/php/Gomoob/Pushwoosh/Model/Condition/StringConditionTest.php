<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Test case used to test the `StringCondition` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  StringConditionTest
 */
class StringConditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test method for the `#eq($value)` function.
     */
    public function testEq()
    {
        $stringCondition = StringCondition::create('A_TAG')->eq('VALUE');
        $array = $stringCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $stringCondition->getTagName());

        $this->assertSame('EQ', $array[1]);
        $this->assertSame('EQ', $stringCondition->getOperator());

        $this->assertSame('VALUE', $array[2]);
        $this->assertSame('VALUE', $stringCondition->getOperand());
    }
    
    /**
     * Test method for the `#in($values)` function.
     */
    public function testIn()
    {
        $stringCondition = StringCondition::create('A_TAG')->in(['VALUE_1', 'VALUE_2', 'VALUE_3']);
        $array = $stringCondition->jsonSerialize();
         
        $this->assertCount(3, $array);
         
        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $stringCondition->getTagName());
         
        $this->assertSame('IN', $array[1]);
        $this->assertSame('IN', $stringCondition->getOperator());
         
        $this->assertSame(['VALUE_1', 'VALUE_2', 'VALUE_3'], $array[2]);
        $this->assertSame(['VALUE_1', 'VALUE_2', 'VALUE_3'], $stringCondition->getOperand());
    }
    
    /**
     * Test method for the `#noteq($value)` function.
     */
    public function testNoteq()
    {
        $stringCondition = StringCondition::create('A_TAG')->noteq('VALUE');
        $array = $stringCondition->jsonSerialize();
    
        $this->assertCount(3, $array);
    
        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $stringCondition->getTagName());
    
        $this->assertSame('NOTEQ', $array[1]);
        $this->assertSame('NOTEQ', $stringCondition->getOperator());
    
        $this->assertSame('VALUE', $array[2]);
        $this->assertSame('VALUE', $stringCondition->getOperand());
    }
    
    /**
     * Test method for the `#notin($values)` function.
     */
    public function testNotin()
    {
        $stringCondition = StringCondition::create('A_TAG')->notin(['VALUE_1', 'VALUE_2', 'VALUE_3']);
        $array = $stringCondition->jsonSerialize();
    
        $this->assertCount(3, $array);
    
        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $stringCondition->getTagName());
    
        $this->assertSame('NOTIN', $array[1]);
        $this->assertSame('NOTIN', $stringCondition->getOperator());
    
        $this->assertSame(['VALUE_1', 'VALUE_2', 'VALUE_3'], $array[2]);
        $this->assertSame(['VALUE_1', 'VALUE_2', 'VALUE_3'], $stringCondition->getOperand());
    }
}
