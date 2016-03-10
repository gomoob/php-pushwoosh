<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

/**
 * Class which represents an Application Integer Tag filter (i.e `AT("ABCDE-FGHIJ", "TagName", EQ, 10)`).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class ApplicationIntTagFilter extends AbstractTagFilter
{
    /**
     * Create a new `ApplicationIntTagFilter` instance.
     *
     * @param string The name of the tag.
     */
    private function __construct($tagName)
    {
        $this->tagName = $tagName;
    }
    
    /**
     * Create a new `ApplicationIntTagFilter` instance.
     *
     * @param string $tagName the name of the tag.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationIntTagFilter the created application tag filter.
     */
    public static function create($tagName)
    {
        return new ApplicationIntTagFilter($tagName);
    }
}
