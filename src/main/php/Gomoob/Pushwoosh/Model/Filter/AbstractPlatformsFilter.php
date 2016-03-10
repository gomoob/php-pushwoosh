<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Condition;

/**
 * Abstract class common to all filters using platforms.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractPlatformsFilter extends AbstractFilter
{
    /**
     * The plateforms to which one to send the messages.
     *
     * @var string[]
     */
    protected $plateforms = [];
    
    /**
     * Create the string representation of this filter.
     *
     * @return string The string representation of this filter.
     */
    public function __toString()
    {
        $string .= $this->letter;
        $string = '(\\"' . $this->application . '\\", [';
    
        $i = 0;
        $nbPlatforms = count($this->plateforms);
        foreach ($this->plateforms as $platform) {
             
            $string .= $platform;
    
            if (++$i < $nbPlatforms) {
                $string .= ', ';
            }
             
        }
    
        $string .= '])';
        return $string;
    }
    
    /**
     * Function used to add all the available platforms in one go.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter this instance.
     */
    public function addAll()
    {
        return $this->addAndroid()
        ->addBlackberry()
        ->addChrome()
        ->addFirefox()
        ->addIOS()
        ->addOsX()
        ->addSafari()
        ->addWindows()
        ->addWindowPhone();
    }
    
    /**
     * Adds the `Amazon` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addAmazon()
    {
        if (!$this->hasAmazon()) {
            $this->plateforms[] = 'Amazon';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Android` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addAndroid()
    {
        if (!$this->hasAndroid()) {
            $this->plateforms[] = 'Android';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Blackberry` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addBlackberry()
    {
        if (!$this->hasBlackberry()) {
            $this->plateforms[] = 'Blackberry';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Chrome` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addChrome()
    {
        if (!$this->hasChrome()) {
            $this->plateforms[] = 'Chrome';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Firefox` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addFirefox()
    {
        if (!$this->hasFirefox()) {
            $this->plateforms[] = 'Firefox';
        }
    
        return $this;
    }
    
    /**
     * Adds the `iOS` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addIOS()
    {
        if (!$this->hasIOS()) {
            $this->plateforms[] = 'iOS';
        }
    
        return $this;
    }
    
    /**
     * Adds the `OsX` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addOsX()
    {
        if (!$this->hasOsX()) {
            $this->plateforms[] = 'OsX';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Safari` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addSafari()
    {
        if (!$this->hasSafari()) {
            $this->plateforms[] = 'Safari';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Windows` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addWindows()
    {
        if (!$this->hasWindows()) {
            $this->plateforms[] = 'Windows';
        }
    
        return $this;
    }
    
    /**
     * Adds the `Windows_Phone` platform to the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function addWindowPhone()
    {
        if (!$this->hasWindowsPhone()) {
            $this->plateforms[] = 'Windows_Phone';
        }
    
        return $this;
    }
    
    /**
     * Checks if the `Amazon` platform is in the platform list.
     *
     * @return boolean `true` if `Amazon` is in the platform list, `false` otherwise.
     */
    public function hasAmazon()
    {
        return in_array('Amazon', $this->plateforms);
    }
    
    /**
     * Checks if the `Android` platform is in the platform list.
     *
     * @return boolean `true` if `Android` is in the platform list, `false` otherwise.
     */
    public function hasAndroid()
    {
        return in_array('Android', $this->plateforms);
    }
    
    /**
     * Checks if the `Blackberry` platform is in the platform list.
     *
     * @return boolean `true` if `Blackberry` is in the platform list, `false` otherwise.
     */
    public function hasBlackberry()
    {
        return in_array('Blackberry', $this->plateforms);
    }
    
    /**
     * Checks if the `Chrome` platform is in the platform list.
     *
     * @return boolean `true` if `Chrome` is in the platform list, `false` otherwise.
     */
    public function hasChrome()
    {
        return in_array('Chrome', $this->plateforms);
    }
    
    /**
     * Checks if the `Firefox` platform is in the platform list.
     *
     * @return boolean `true` if `Firefox` is in the platform list, `false` otherwise.
     */
    public function hasFirefox()
    {
        return in_array('Firefox', $this->plateforms);
    }
    
    /**
     * Checks if the `iOS` platform is in the platform list.
     *
     * @return boolean `true` if `iOS` is in the platform list, `false` otherwise.
     */
    public function hasIOS()
    {
        return in_array('iOS', $this->plateforms);
    }
    
    /**
     * Checks if the `OsX` platform is in the platform list.
     *
     * @return boolean `OsX` if `Amazon` is in the platform list, `false` otherwise.
     */
    public function hasOsX()
    {
        return in_array('OsX', $this->plateforms);
    }
    
    /**
     * Checks if the `Safari` platform is in the platform list.
     *
     * @return boolean `true` if `Safari` is in the platform list, `false` otherwise.
     */
    public function hasSafari()
    {
        return in_array('Safari', $this->plateforms);
    }
    
    /**
     * Checks if the `Windows` platform is in the platform list.
     *
     * @return boolean `true` if `Windows` is in the platform list, `false` otherwise.
     */
    public function hasWindows()
    {
        return in_array('Windows', $this->plateforms);
    }
    
    /**
     * Checks if the `Windows_Phone` platform is in the platform list.
     *
     * @return boolean `true` if `Windows_Phone` is in the platform list, `false` otherwise.
     */
    public function hasWindowsPhone()
    {
        return in_array('Windows_Phone', $this->plateforms);
    }
    
    /**
     * Removes the `Amazon` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeAmazon()
    {
        if ($this->hasAmazon()) {
            $key = array_search('Amazon', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `Android` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeAndroid()
    {
        if ($this->hasAndroid()) {
            $key = array_search('Android', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `Blackberry` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeBlackberry()
    {
        if ($this->hasBlackberry()) {
            $key = array_search('Blackberry', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `Chrome` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeChrome()
    {
        if ($this->hasChrome()) {
            $key = array_search('Chrome', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `Firefox` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeFirefox()
    {
        if ($this->hasFirefox()) {
            $key = array_search('Firefox', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `iOS` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeIOS()
    {
        if ($this->hasIOS()) {
            $key = array_search('iOS', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `OsX` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeOsX()
    {
        if ($this->hasOsX()) {
            $key = array_search('OsX', $this->plateforms);
            unset($this->plateforms[$key]);
        }
         
        return $this;
    }
    
    /**
     * Removes the `Safari` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeSafari()
    {
        if ($this->hasSafari()) {
            $key = array_search('Safari', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `Windows` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeWindows()
    {
        if ($this->hasWindows()) {
            $key = array_search('Windows', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
    
    /**
     * Removes the `Windows_Phone` platform from the platform list.
     *
     * @return \Gomoob\Pushwoosh\Model\Filter\ApplicationFilter this instance.
     */
    public function removeWindowsPhone()
    {
        if ($this->hasWindowsPhone()) {
            $key = array_search('Windows_Phone', $this->plateforms);
            unset($this->plateforms[$key]);
        }
    
        return $this;
    }
}
