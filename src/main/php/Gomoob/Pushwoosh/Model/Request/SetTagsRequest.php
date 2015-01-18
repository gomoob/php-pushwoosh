<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

/**
 * Class which represents Pushwoosh '/setTags' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class SetTagsRequest
{
    /**
     * The Pushwoosh application ID for which one to set tags.
     *
     * @var string
     */
    private $application;

    /**
     * The Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not allowed,
     * one of the alternative ways now is to use MAC address).
     *
     * @var string
     */
    private $hwid;

    /**
     * The Pushwoosh tags.
     *
     * @var array
     */
    private $tags;

    /**
     * Utility function used to create a new instance of the <tt>SetTagsRequest</tt>.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\SetTagsRequest the new created instance.
     */
    public static function create()
    {
        return new SetTagsRequest();

    }

    /**
     * Add a new tag to the Pushwoosh tags.
     *
     * <p>NOTE: This function cannot be used to overwrite an existing tag, use the '#setTag($tagName, $tagValue)'
     *          function if you want to overwrite a tag.</p>
     *
     * @param string $tagName  the name of the tag to add or update.
     * @param mixed  $tagValue the value of the tag to set.
     *
     * @throws \Gomoob\Pushwoosh\Exception\PushwooshException if a tag having the specified name has already been added.
     */
    public function addTag($tagName, $tagValue)
    {
        if (!isset($this->tags)) {
            $this->tags = array();

        }

        // The same tag cannot be added 2 times
        if (array_key_exists($tagName, $this->tags)) {
            throw new PushwooshException(
                'The tag \'' . $tagName .
                '\' has already been added, use the \'setTag\' method if you want to overwrite its value !'
            );

        }

        $this->tags[$tagName] = $tagValue;

    }

    /**
     * Gets the Pushwoosh application ID for which one to set tags.
     *
     * @return string the Pushwoosh application ID for which one to set tags.
     */
    public function getApplication()
    {
        return $this->application;

    }

    /**
     * Gets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
     * allowed, one of the alternative ways now is to use MAC address).
     *
     * @return string the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and
     *         not allowed, one of the alternative ways now is to use MAC address).
     */
    public function getHwid()
    {
        return $this->hwid;

    }

    /**
     * Gets the Pushwoosh tags.
     *
     * @return array the Pushwoosh tags.
     */
    public function getTags()
    {
        return $this->tags;

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
        return $this->tags !== null && array_key_exists($tagName, $this->tags);
    }

    /**
     * Function used to remove a tag from the Pushwoosh tags.
     *
     * <p>NOTE: If you try to remove a tag which does not exists the function has not effect.</p>
     *
     * @param string $tagName the name of the tag to remove.
     */
    public function removeTag($tagName)
    {
        if ($this->tags !== null && array_key_exists($tagName, $this->tags)) {
            unset($this->tags[$tagName]);

        }
    }

    /**
     * Sets the Pushwoosh application ID for which one to set tags.
     *
     * @param string $application the the Pushwoosh application ID for which one to set tags.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\SetTagsRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;

    }

    /**
     * Sets the Unique string to identify the device (Please note that accessing UDID on iOS is deprecated and not
     * allowed, one of the alternative ways now is to use MAC address).
     *
     * @param string $hwid the Unique string to identify the device (Please note that accessing UDID on iOS is
     *        deprecated and not allowed, one of the alternative ways now is to use MAC address).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\SetTagsRequest this instance.
     */
    public function setHwid($hwid)
    {
        $this->hwid = $hwid;

        return $this;

    }

    /**
     * Add a new tag to the Pushwoosh tags or overwrites the value of an existing tag.
     *
     * @param string $tagName  the name of the tag to add or update.
     * @param mixed  $tagValue the value of the tag to set.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\SetTagsRequest this instance.
     */
    public function setTag($tagName, $tagValue)
    {
        if (!isset($this->tags)) {
            $this->tags = array();

        }

        $this->tags[$tagName] = $tagValue;

        return $this;

    }

    /**
     * Sets the Pushwoosh tags.
     *
     * @param array $tags the Pushwoosh tags.
     *
     * @return \Gomoob\Pushwoosh\Model\Request\SetTagsRequest this instance.
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;

        return $this;

    }

    /**
     * Creates a JSON representation of this request.
     *
     * @return array a PHP array which can be passed to the 'json_encode' PHP method.
     */
    public function toJSON()
    {
        // The 'application' parameter must have been defined.
        if (!isset($this->application)) {
            throw new PushwooshException('The \'application\' property is not set !');

        }

        // The 'hwid' parameter must have been defined.
        if (!isset($this->hwid)) {
            throw new PushwooshException('The \'hwid\' property is not set !');

        }

        // The 'tags' parameter must have been defined.
        if (!isset($this->tags)) {
            throw new PushwooshException('The \'tags\' property is not set !');

        }

        $json = array(
            'application' => $this->application,
            'hwid' => $this->hwid,
            'tags' => $this->tags
        );

        return $json;

    }
}
