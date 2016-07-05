<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

use PHPUnit\Framework\TestCase;

/**
 * Test case used to test the `DateCondition` class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @group  DateConditionTest
 */
class DateConditionTest extends TestCase
{
    /**
     * Test method for the `#between($minValue, $maxValue)` function.
     */
    public function testBetween()
    {
        $minValue = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        $maxValue = \DateTime::createFromFormat('Y-m-d h:i', '2016-02-03 10:05');
        
        $dateCondition = DateCondition::create('A_TAG')->between($minValue, $maxValue);
        $array = $dateCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());

        $this->assertSame('BETWEEN', $array[1]);
        $this->assertSame('BETWEEN', $dateCondition->getOperator());

        $this->assertCount(2, $array[2]);
        $this->assertSame('2015-01-01 09:00', $array[2][0]);
        $this->assertSame('2016-02-03 10:05', $array[2][1]);

        $operand = $dateCondition->getOperand();
        $this->assertCount(2, $operand);
        $this->assertSame($minValue, $operand[0]);
        $this->assertSame($maxValue, $operand[1]);
    }

    /**
     * Test method for the `#eq($value)` function.
     */
    public function testEq()
    {
        $value = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        
        $dateCondition = DateCondition::create('A_TAG')->eq($value);
        $array = $dateCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());

        $this->assertSame('EQ', $array[1]);
        $this->assertSame('EQ', $dateCondition->getOperator());

        $this->assertSame('2015-01-01 09:00', $array[2]);
        $this->assertSame($value, $dateCondition->getOperand());
    }

    /**
     * Test method for the `#gte($value)` function.
     */
    public function testGte()
    {
        $value = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        
        $dateCondition = DateCondition::create('A_TAG')->gte($value);
        $array = $dateCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());

        $this->assertSame('GTE', $array[1]);
        $this->assertSame('GTE', $dateCondition->getOperator());

        $this->assertSame('2015-01-01 09:00', $array[2]);
        $this->assertSame($value, $dateCondition->getOperand());
    }
    
    /**
     * Test method for the `#in($values)` function.
     */
    public function testIn()
    {
        $value1 = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        $value2 = \DateTime::createFromFormat('Y-m-d h:i', '2016-01-02 10:05');
        $value3 = \DateTime::createFromFormat('Y-m-d h:i', '2016-02-03 11:10');
        $values = [$value1, $value2, $value3];

        $dateCondition = DateCondition::create('A_TAG')->in($values);
        $array = $dateCondition->jsonSerialize();
        
        $this->assertCount(3, $array);
        
        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());
        
        $this->assertSame('IN', $array[1]);
        $this->assertSame('IN', $dateCondition->getOperator());
        
        $this->assertSame(['2015-01-01 09:00', '2016-01-02 10:05', '2016-02-03 11:10'], $array[2]);
        $this->assertSame($values, $dateCondition->getOperand());
    }

    /**
     * Test method for the `#lte($value)` function.
     */
    public function testLte()
    {
        $value = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        
        $dateCondition = DateCondition::create('A_TAG')->lte($value);
        $array = $dateCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());

        $this->assertSame('LTE', $array[1]);
        $this->assertSame('LTE', $dateCondition->getOperator());

        $this->assertSame('2015-01-01 09:00', $array[2]);
        $this->assertSame($value, $dateCondition->getOperand());
    }
    
    /**
     * Test method for the `#noteq($value)` function.
     */
    public function testNoteq()
    {
        $value = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        
        $dateCondition = DateCondition::create('A_TAG')->noteq($value);
        $array = $dateCondition->jsonSerialize();

        $this->assertCount(3, $array);

        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());

        $this->assertSame('NOTEQ', $array[1]);
        $this->assertSame('NOTEQ', $dateCondition->getOperator());

        $this->assertSame('2015-01-01 09:00', $array[2]);
        $this->assertSame($value, $dateCondition->getOperand());
    }
    
    /**
     * Test method for the `#notin($values)` function.
     */
    public function testNotin()
    {
        $value1 = \DateTime::createFromFormat('Y-m-d h:i', '2015-01-01 09:00');
        $value2 = \DateTime::createFromFormat('Y-m-d h:i', '2016-01-02 10:05');
        $value3 = \DateTime::createFromFormat('Y-m-d h:i', '2016-02-03 11:10');
        $values = [$value1, $value2, $value3];
        
        $dateCondition = DateCondition::create('A_TAG')->notin($values);
        $array = $dateCondition->jsonSerialize();
         
        $this->assertCount(3, $array);
         
        $this->assertSame('A_TAG', $array[0]);
        $this->assertSame('A_TAG', $dateCondition->getTagName());
         
        $this->assertSame('NOTIN', $array[1]);
        $this->assertSame('NOTIN', $dateCondition->getOperator());
 
        $this->assertSame(['2015-01-01 09:00', '2016-01-02 10:05', '2016-02-03 11:10'], $array[2]);
        $this->assertSame($values, $dateCondition->getOperand());
    }
}
