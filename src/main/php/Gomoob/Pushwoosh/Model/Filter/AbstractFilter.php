<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

/**
 * Abstract class common to all devices filters.
 * 
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractFilter implements IFilter
{
	/**
	 * The letter used to construct the string filter, this can be equal to `A`, `T`, `G` or `AT`.
	 * 
	 * @var string
	 */
    protected $letter;
}