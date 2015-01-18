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
     * Create a new <code>IntCondition</code> instance.
     */
    private function __construct($tagName)
    {
        $this->tagName = $tagName;
    }

    /**
     * Apply a between operator to min and max operand values.
     *
     * @param int $minValue the integer min value of the range.
     * @param int $maxValue the integer max value of the range.
     *
     * @return \Gomoob\Pushwoosh\Model\Condition\IntCondition this instance.
     */
    public function between($minValue, $maxValue)
    {
        $this->operator = 'BETWEEN';
        $this->operand = array($minValue, $maxValue);

        return $this;

    }

    /**
     * Create a new <code>IntCondition</code> instance.
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
     * Apply an equals operator to a specified operand value.
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
     * Apply a greater than or equals operator to a specified operand value.
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
     * Apply a less than or equals operator to a specified operand value.
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
}
