<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/getTags' response response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class GetTagsResponseResponse
{
    /**
     * The result sent in response to a Get Tags request.
     *
     * @var array
     */
    private $result;

    /**
     * Gets the Pushwoosh tags sent in response to a Get Tags request.
     *
     * @return array the Pushwoosh tags.
     */
    public function getTags()
    {
        return $this->result;
    }

    /**
     * Gets the result sent in response to a Get Tags request.
     *
     * @return array the result sent in response to a Get Tags request.
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Function used to check if a tag having a specified name exists.
     *
     * @param string $tagName the name of the tag.
     *
     * @return boolean true if a tag having a name equal to <tt>$tagName</tt> exists, false otherwise.
     */
    public function hasTag($tagName)
    {
        return $this->result !== null && array_key_exists($tagName, $this->result);
    }

    /**
     * Sets the result sent in response to a Get Tags request.
     *
     * @param array $result the result sent in response to a Get Tags request.
     */
    public function setResult(array $result)
    {
        $this->result = $result;
    }
}
