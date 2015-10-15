<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2015, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Curl;

/**
 * An implementation for the ICurlRequest interface.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 *
 * @see http://php.net/manual/book.curl.php
 */
class CurlRequest implements ICurlRequest
{
	// @codingStandardsIgnoreStart
	/**
	 * A regular expression used to validate URLs.
	 *
	 * @see https://mathiasbynens.be/demo/url-regex
	 * @see https://gist.github.com/dperini/729294
	 */
	const URL_REGEX = '_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(localhost)|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/\S*)?$_iuS';
	// @codingStandardsIgnoreEnd

    /**
     * The current cURL handle.
     *
     * @var mixed
     */
    private $ch;

    /**
     * Initialize a cURL session.
     *
     * @param string $url If provided, the CURLOPT_URL option will be set to its value.
     *
     * @throws \Exception If the provided URL is not valid.
     */
    public function __construct($url = null)
    {
        // If a URL is provided
        if (isset($url)) {
            // The provided URL must be valid
            if (!$this->isUrlValid($url)) {
                throw new \Exception('Invalid URL provided \'' . $url . '\' !', -1, null);

            }

            $this->init($url);

        }

    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        curl_close($this->getCh());

        $this->ch = null;
    }
    
    /**
     * {@inheritdoc}
     */
    public function error()
    {
        return curl_error($this->getCh());
    }

    /**
     * {@inheritdoc}
     */
    public function exec()
    {
        return curl_exec($this->getCh());
    }

    /**
     * {@inheritdoc}
     */
    public function init($url = null)
    {

        // If a previous CURL handle exists close it
        if ($this->ch) {
            $this->close();

        }

        $this->ch = curl_init($url);
        return $this->ch;

    }

    /**
     * {@inheritdoc}
     */
    public function getInfo($opt = 0)
    {
        return curl_getinfo($this->ch, $opt);
    }

    /**
     * {@inheritdoc}
     */
    public function setOpt($option, $value)
    {
        return curl_setopt($this->ch, $option, $value);
    }

    /**
     * Gets the CURL handle is use.
     *
     * @throws IllegalStateException If the init method has not been called.
     */
    private function getCh()
    {
        if (!$this->ch) {
            throw new \Exception('No CURL handle found, did you call init ?');
        }

        return $this->ch;
    }
    
    /**
     * Indicates if a URL is valid.
     *
     * @param string $url the URL to validate.
     *
     * @return bool `true` if `$url` is valid, `false` otherwise.
     */
    private function isUrlValid($url)
    {
        return (bool) preg_match(static::URL_REGEX, $url);
    }
}
