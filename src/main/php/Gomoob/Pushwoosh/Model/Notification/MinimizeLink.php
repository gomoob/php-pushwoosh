<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Notification;

/**
 * Class which represents a value for link minimization.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class MinimizeLink
{
    /**
     * The value of the minimize link, this can be equal to :
     *     - 0 or false : do not minimize the link
     *  - 1 : (Default) Minimze with Google
     *  - 2 : Minimize with Bitly
     *  - 3 : Minimize with Baidu (china)
     *
     * @var int
     */
    private $value;

    /**
     * Create a new <code>MinimizeLink</code> instance.
     *
     * @param int $value the value.
     */
    private function __construct($value)
    {
        $this->value = $value;

    }

    /**
     * Gets a <code>MinimizeLink</code> instance for Baidu (china) minimization.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the created <code>MinimizeLink</code> instance.
     */
    public static function baiduChina()
    {
        return new MinimizeLink(3);
    }

    /**
     * Gets a <code>MinimizeLink</code> instance for Bitly minimization.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the created <code>MinimizeLink</code> instance.
     */
    public static function bitly()
    {
        return new MinimizeLink(2);
    }

    /**
     * Gets a <code>MinimizeLink</code> instance for no minimization.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the created <code>MinimizeLink</code> instance.
     */
    public static function none()
    {
        return new MinimizeLink(0);

    }

    /**
     * Gets a <code>MinimizeLink</code> instance for Google minimization.
     *
     * @return \Gomoob\Pushwoosh\Model\Notification\MinimizeLink the created <code>MinimizeLink</code> instance.
     */
    public static function google()
    {
        return new MinimizeLink(1);

    }

    /**
     * Gets the value of the minimize link, this can be equal to :
     *     - 0 or false : do not minimize the link
     *  - 1 : (Default) Minimze with Google
     *  - 2 : Minimize with Bitly
     *  - 3 : Minimize with Baidu (china)
     *
     * @return int the value of the minimize link.
     */
    public function getValue()
    {
        return $this->value;
    }
}
