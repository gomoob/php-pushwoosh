<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh;

/**
 * Utility class used in the whole library.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class JsonUtils
{
    /**
     * Merge multiple `\JsonSerializable` serializable objects into an array.
     *
     * @param array $array The array into witch one to merge the values of the `JsonSerializable` object.
     * @param array $jsonSerializables The `JsonSerializable` objects to merge.
     *
     * @return array The resul of the merge as an array.
     */
    public static function mergeJsonSerializables(&$array /*, \JsonSerializable ... */)
    {
        $numberOfArguments = func_num_args();
        $arguments = func_get_args();

        for ($i = 1; $i < $numberOfArguments; ++$i) {
            $argument = $arguments[$i];

            if (isset($argument)) {
                $array = array_merge($array, $argument->jsonSerialize());
            }
        }

        return $array;
    }
}
