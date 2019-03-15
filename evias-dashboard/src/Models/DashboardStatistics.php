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

namespace eVias\Dashboard\Models;

use DB;

class DashboardStatistics
{
    protected $_table = "dashboard_statistics";

    static public function getStatisticsAggregation()
    {
        return DB::select(DB::raw("select dashboard_statistics.* from dashboard_statistics"))[0];
    }
}
