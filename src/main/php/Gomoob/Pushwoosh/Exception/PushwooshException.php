<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Exception;

/**
 * Pushwoosh Exception class.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class PushwooshException extends \Exception
{
    /**
     * Additional data attached to the exception, those data must be represented as an array which is serializable in a
     * JSON format.
     *
     * @var array
     */
    private $data = array();
    
    /**
     * Creates a new instance of the Pushwoosh Exception.
     *
     * @param string $message A message used to describe the error.
     * @param int $code A interger error code used to describe the error.
     * @param \Exception $previous A previous exception which leads to a creation of this exception.
     * @param array $data Additional data / details to attach to the exception.
     */
    public function __construct($message = null, $code = null, $previous = null, array $data = array())
    {

        parent::__construct($message, $code, $previous);

        $this->data = $data;
        
    }

    
    /**
     * Gets the additional data attached to the exception, those data must be represented as an array which is
     * serializable in a JSON format.
     *
     * @return array The additional data / details attached to the exception.
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the additional data attached to the exception, those data must be represented as an array which is
     * serializable in a JSON format.
     *
     * @param array $data Additional data / details to attach to the exception.
     */
    public function setData(array $data)
    {

        $this->data = $data;
        
    }
}
