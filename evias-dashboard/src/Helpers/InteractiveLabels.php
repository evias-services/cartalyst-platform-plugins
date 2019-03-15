<?php
/**
 * Part of the evias/dashboard package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    evias/dashboard
 * @subpackage Controllers, Helpers, Models, Repositories, Handlers, etc.
 * @version    1.0.0
 * @author     eVias Services <info@evias.be>
 * @license    BSD License (3-clause)
 * @copyright  (c) 2015-2019, eVias Services
 */

namespace eVias\Dashboard\Helpers;

use Platform\Users\Repositories\UserRepository;

use InvalidArgumentException;

/**
 * Class InteractiveLabels
 */
class InteractiveLabels
{
    /**
     * List of support object types
     *
     * @array
     **/
    static protected $typeClassMap = [
        'user'          => '\eVias\Users\Models\Affiliate',
        'transaction'   => '\eVias\Ewallet\Models\Transaction',
    ];

    /**
     * Load an object dynamically according to the given TYPE and ID.
     * If the object cannot be loaded, an exception will be thrown of
     * type InvalidArgumentException.
     *
     * @param   array   $params
     * @return mixed
     * @throws InvalidArgumentException
     **/
    public function getObject(array $params = [])
    {
        if (empty($params['objectType']) || empty($params['objectId']))
            throw new InvalidArgumentException("Missing mandatory field for call to InteractiveLabels::getObject");

        if (! in_array($params['objectType'], array_keys(self::$typeClassMap)))
            throw new InvalidArgumentException("Invalid objectType parameter '" . $params['objectType'] . "' in call to InteractiveLabels::getObject");

        if (! is_numeric($params['objectId']))
            // not-verbose-on-purpose
            throw new InvalidArgumentException("Invalid Request");

        $objectType = $params['objectType'];
        $objectId   = $params['objectId'];

        $class  = self::$typeClassMap[$objectType];
        $object = call_user_func_array([$class, 'where'], ["id", (int) $objectId]);
        $object = $object->first();

        if (! $object instanceof $class)
            throw new InvalidArgumentException("Object of type '" . $objectType . "' with ID #" . $objectId . " could not be loaded.");

        return $object;
    }
}

