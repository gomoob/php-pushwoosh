<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Interface which represents a condition to be added to a Pushwoosh Notification.
 *
 * A conditin is defined by :
 *  - a tag name
 *  - an operator
 *  - an operand
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
interface ICondition
{
    /**
     * Gets the operand.
     *
     * @return mixed the operand.
     */
    public function getOperand();

    /**
     * Gets the operator.
     *
     * @return string the operator.
     */
    public function getOperator();

    /**
     * Gets the name of the tag.
     *
     * @return string the name of the tag.
     */
    public function getTagName();

    /**
     * Creates a JSON representation of this condition.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON();
}
