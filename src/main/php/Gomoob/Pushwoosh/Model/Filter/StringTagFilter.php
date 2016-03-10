<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

/**
 * Class which represents a String Tag filter (i.e `T("favorite_color", IN, ["red","green","blue"])`).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class StringTagFilter extends AbstractTagFilter
{
    /**
     * Create a new `StringTagFilter` instance.
     *
     * @param string The name of the tag.
     */
    private function __construct($tagName)
    {
        $this->tagName = $tagName;
    }
    
    /**
     * Create a new `StringTagFilter` instance.
     *
     * @param string $tagName the name of the tag.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\StringTagFilter the created tag filter.
     */
    public static function create($tagName)
    {
        return new StringTagFilter($tagName);
    }
}
