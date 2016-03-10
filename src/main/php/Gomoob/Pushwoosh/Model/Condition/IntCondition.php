<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Class which represents an integer condition.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class IntCondition extends AbstractCondition
{
    /**
     * Create a new `IntCondition` instance.
     *
     * @param string The name of the tag.
     */
    private function __construct($tagName)
    {
        $this->tagName = $tagName;
    }

    /**
     * Apply a between operator (i.e `BETWEEN`) to min and max operand values.
     *
     * @param int $minValue the integer min value of the range.
     * @param int $maxValue the integer max value of the range.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function between($minValue, $maxValue)
    {
        $this->operator = 'BETWEEN';
        $this->operand = [$minValue, $maxValue];

        return $this;
    }

    /**
     * Create a new `IntCondition` instance.
     *
     * @param string $tagName the name of the tag.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition the created integer condition.
     */
    public static function create($tagName)
    {
        return new IntCondition($tagName);
    }

    /**
     * Apply an equals operator (i.e `EQ`) to a specified operand value.
     *
     * @param int $value the integer value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function eq($value)
    {
        $this->operator = 'EQ';
        $this->operand = $value;

        return $this;
    }

    /**
     * Apply a greater than or equals operator (i.e `GTE`) to a specified operand value.
     *
     * @param int $value the integer value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function gte($value)
    {
        $this->operator = 'GTE';
        $this->operand = $value;

        return $this;
    }
    
    /**
     * Apply an inclusion operator (i.e `IN`) to a specified array of values.
     *
     * @param int[] $values the array of integer values to check for inclusion.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function in(array $values = [])
    {
        $this->operator = 'IN';
        $this->operand = $values;
        
        return $this;
    }

    /**
     * Apply a less than or equals operator (i.e `LTE`) to a specified operand value.
     *
     * @param int $value the integer value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function lte($value)
    {
        $this->operator = 'LTE';
        $this->operand = $value;

        return $this;
    }
    
    /**
     * Apply a not equals operator (i.e `NOTEQ`) to a specified operand value.
     *
     * @param int $value the integer value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function noteq($value)
    {
        $this->operator = 'NOTEQ';
        $this->operand = $value;
         
        return $this;
    }
    
    /**
     * Apply an exclusion operator (i.e `NOTIN`) to a specified array of values.
     *
     * @param int[] $values the array of integer values to check for exclusion.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function notin(array $values = [])
    {
        $this->operator = 'NOTIN';
        $this->operand = $values;
    
        return $this;
    }
}
