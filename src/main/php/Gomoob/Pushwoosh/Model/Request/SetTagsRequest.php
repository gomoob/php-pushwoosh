<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

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
	 * <p>WARNING: If this function is called with a tag name wich already exists its value will be overwridden.</p>
	 *
	 * @param string $tagName the name of the tag to add or update.
	 * @param mixed $tagValue the value of the tag to set.
	 */
    public function addTag($tagName, $tagValue)
    {
        if (!isset($this->tags)) {

            $this->tags = array();

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
	 * @return array a PHP which can be passed to the 'json_encode' PHP method.
	 */
    public function toJSON()
    {
        $json = array(
            'application' => $this->application,
            'hwid' => $this->hwid,
            'tags' => $this->tags
        );

        return $json;

    }
}
