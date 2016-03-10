<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2016, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Response;

/**
 * Class which represents Pushwoosh '/createTargetedMessage' response response.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CreateTargetedMessageResponseResponse
{
    /**
     * The Pushwoosh message code sent in response to a Create Targeted Message request.
     *
     * @var string
     */
    private $messageCode;

    /**
     * Gets the Pushwoosh message code sent in response to a Create Targeted Message request.
     *
     * @return string the the Pushwoosh message code sent in response to a Create Targeted Message request.
     */
    public function getMessageCode()
    {
        return $this->messageCode;
    }

    /**
     * Sets the Pushwoosh message code sent in response to a Create Targeted Message request.
     *
     * @param string $messageCode the Pushwoosh message code sent in response to a Create Targeted Message Request.
     */
    public function setMessageCode($messageCode)
    {
        $this->messageCode = $messageCode;
    }
}
