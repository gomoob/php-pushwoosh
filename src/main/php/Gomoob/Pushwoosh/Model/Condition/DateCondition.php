<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Class which represents a date condition.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class DateCondition extends AbstractCondition
{
    /**
     * Create a new `DateCondition` instance.
     */
    private function __construct($tagName)
    {
        $this->tagName = $tagName;
    }
    
    /**
     * Apply a between operator (i.e `BETWEEN`) to min and max operand values.
     *
     * @param \DateTime $minValue the date and time min value of the range.
     * @param \DateTime $maxValue the date and time max value of the range.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
     */
    public function between($minValue, $maxValue)
    {
        $this->operator = 'BETWEEN';
        $this->operand = [$minValue, $maxValue];
    
        return $this;
    }
    
    /**
     * Create a new `DateCondition` instance.
     *
     * @param string $tagName the name of the tag.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition the created date condition.
     */
    public static function create($tagName)
    {
        return new DateCondition($tagName);
    }
    
    /**
     * Apply an equals operator (i.e `EQ`) to a specified operand value.
     *
     * @param \DateTime $value the date and time value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
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
     * @param \DateTime $value the date and time value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
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
     * @param \DateTime[] $values the array of date and time values to check for inclusion.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
     */
    public function in(array $values = [])
    {
        $this->operator = 'IN';
        $this->operand = $values;
         
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        $operandWithString = null;
        
        // The operand is an array of date and time objects
        if (is_array($this->operand)) {
            $operandWithString = [];

            foreach ($this->operand as $dateAndTime) {
                $operandWithString[] = $dateAndTime->format('Y-m-d h:i');
            }
        } // The operand is a date and time object
        else {
            $operandWithString = $this->operand->format('Y-m-d h:i');
        }
        
        return [
            $this->tagName,
            $this->operator,
            $operandWithString
        ];
    }
    
    /**
     * Apply a less than or equals operator (i.e `LTE`) to a specified operand value.
     *
     * @param \DateTime $value the date and time value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
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
     * @param \DateTime $value the date and time value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
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
     * @param \DateTime[] $values the array of date and time values to check for exclusion.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\DateCondition this instance.
     */
    public function notin(array $values = [])
    {
        $this->operator = 'NOTIN';
        $this->operand = $values;
    
        return $this;
    }
}
