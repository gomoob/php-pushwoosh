<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model;

/**
 * Interface common to all Pushwoosh responses.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
interface IResponse
{
    /**
     * Gets the Pushwoosh status code, , the Pushwoosh API can return the following create message status codes :
     *  - 200    : (HTTP Status Code = 200) Message succesfully created.
     *  - 210    : (HTTP Status Code = 200) Argument error. See statusMessage for more info.
     *  - 400    : (HTTP Status Code = N/A) Malformed request string.
     *  - 500    : (HTTP Status Code = 500) Internal error.
     *
     * @return int the Pushwoosh status code.
     */
    public function getStatusCode();
    
    /**
     * Gets the Pushwoosh status message.
     *
     * @return string the Pushwoosh status message.
     */
    public function getStatusMessage();
    
    /**
     * Function used to indicate if the response represents a success.
     *
     * @return boolean true if the response represents a success, false otherwise.
     */
    public function isOk();
    
    /**
     * Sets the Pushwoosh status code, the Pushwoosh API can return the following create message status codes :
     *  - 200    : (HTTP Status Code = 200) Message succesfully created.
     *  - 210    : (HTTP Status Code = 200) Argument error. See statusMessage for more info.
     *  - 400    : (HTTP Status Code = N/A) Malformed request string.
     *  - 500    : (HTTP Status Code = 500) Internal error.
     *
     * @param int $statusCode the Pushwoosh status code.
     */
    public function setStatusCode($statusCode);
    
    /**
     * Sets the Pushwoosh status message.
     *
     * @param string $statusMessage the pushwoosh status message.
     */
    public function setStatusMessage($statusMessage);
}
