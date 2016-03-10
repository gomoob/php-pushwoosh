<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

/**
 * Class which represents an Integer Tag filter (i.e `T("age", BETWEEN, [17,20])`).
 * 
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class IntTagFilter extends AbstractTagFilter
{
	/**
	 * Create a new `TagFilter` instance.
	 *
	 * @param string The name of the tag.
	 */
	private function __construct($tagName)
	{
		$this->tagName = $tagName;
	}
	
	/**
	 * Create a new `TagFilter` instance.
	 *
	 * @param string $tagName the name of the tag.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Filter\TagFilter the created tag filter.
	 */
	public static function create($tagName)
	{
		return new IntTagFilter($tagName);
	}
}