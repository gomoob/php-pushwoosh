<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Abstract class common to all conditions.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractCondition implements ICondition
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
     * {@inheritDoc}
     */
    public function getOperand()
    {
        return $this->operand;

    }

    /**
     * {@inheritDoc}
     */
    public function getOperator()
    {
        return $this->operator;

    }

    /**
     * {@inheritDoc}
     */
    public function getTagName()
    {
        return $this->tagName;

    }

    /**
     * {@inheritDoc}
     */
    public function toJSON()
    {
        return array(
            $this->tagName,
            $this->operator,
            $this->operand
        );
    }
}
