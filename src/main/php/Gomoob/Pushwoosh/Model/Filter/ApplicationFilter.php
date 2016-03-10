<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

use Gomoob\Pushwoosh\Model\Condition\AbstractPlatformsFilter;

/**
 * Class which represents an Application filter (i.e `T("age", BETWEEN, [17,20])A("ABCDE-FGHIJ", ["iOS", "Android"])`).
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class ApplicationFilter extends AbstractPlatformsFilter
{
    /**
     * The Pushwoosh application ID where to send the messages.
     *
     * @var string
     */
    private $application;
    
    /**
     * Creates a new `ApplicationFilter` instance.
     */
    public function __construct()
    {
        $this->letter = 'A';
    }

    /**
     * Gets the Pushwoosh application ID.
     *
     * @return string the Pushwoosh application ID.
     */
    public function getApplication()
    {
        return $this->application;
    }
    
    /**
     * Sets the Pushwoosh application ID.
     *
     * @param string $application the Pushwoosh application ID.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;
    
        return $this;
    }
}
