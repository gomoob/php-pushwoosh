<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Filter;

/**
 * Class which represents an Application Group filter (i.e `G("11111-11111", ["iOS","Android"])`).
 * 
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class ApplicationGroupFilter extends \JsonSerializable
{
	/**
	 * The Pushwoosh Application group code.
	 *
	 * @var string
	 */
	private $applicationsGroup;
	
	/**
	 * Creates a new `ApplicationGroupFilter` instance.
	 */
	public function __construct()
	{
		$this->letter = 'G';
	}
	
	/**
	 * Gets the Pushwoosh Application group code.
	 *
	 * @return string the Pushwoosh Application group code.
	 */
	public function getApplicationsGroup()
	{
		return $this->applicationsGroup;
	}
	
	/**
	 * Sets the Pushwoosh Application group code.
	 *
	 * @param string $applicationsGroup the Pushwoosh Application group code.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationGroupFilter this instance.
	 */
	public function setApplicationsGroup($applicationsGroup)
	{
		$this->applicationsGroup = $applicationsGroup;
	
		return $this;
	}
}