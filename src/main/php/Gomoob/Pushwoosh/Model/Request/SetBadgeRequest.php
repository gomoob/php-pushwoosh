<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

/**
 * Class which represents Pushwoosh '/setBadge' request.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class SetBadgeRequest
{
    /**
	 * Utility function used to create a new instance of the <tt>SetBadgeRequest</tt>.
	 *
	 * @return \Gomoob\Pushwoosh\Model\Request\SetBadgeRequest the new created instance.
	 */
    public static function create()
    {
        return new SetBadgeRequest();

    }
}
