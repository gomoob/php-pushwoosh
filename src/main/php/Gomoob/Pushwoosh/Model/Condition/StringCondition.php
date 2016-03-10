<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Class which represents a string condition.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class StringCondition extends AbstractCondition
{
    /**
     * Create a new `StringCondition` instance.
     */
    private function __construct($tagName)
    {
        $this->tagName = $tagName;
    }

    /**
     * Create a new `StringCondition` instance.
     *
     * @param string $tagName the name of the tag.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\StringCondition the created string condition.
     */
    public static function create($tagName)
    {
        return new StringCondition($tagName);
    }

    /**
     * Apply an equals operator to a specified operand value.
     *
     * @param string $value the string value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\StringCondition this instance.
     */
    public function eq($value)
    {
        $this->operator = 'EQ';
        $this->operand = $value;

        return $this;
    }
    
    /**
     * Apply an inclusion operator (i.e `IN`) to a specified array of values.
     *
     * @param string[] $values the array of string values to check for inclusion.
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
     * Apply a not equals operator (i.e `NOTEQ`) to a specified operand value.
     *
     * @param string $value the string value to compare with.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\StringCondition this instance.
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
     * @param string[] $values the array of string values to check for exclusion.
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
