<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

/**
 * Abstract class common to all tag filters.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractTagFilter extends AbstractFilter
{
    /**
     * The operand.
     *
     * @var mixed
     */
    protected $operand;
    
    /**
     * The operator.
     *
     * @var string
     */
    protected $operator;
    
    /**
     * The tag name.
     *
     * @var string
     */
    protected $tagName;
    
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
