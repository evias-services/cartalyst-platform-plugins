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

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPendingPlacementsStat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("dashboard_statistics", function(Blueprint $table)
		{
			$table->integer('count_pending_placements')
			      ->unsigned()
			      ->after('count_pending_withdrawals');

			$table->decimal('sum_pending_placements', 12, 2)
		          ->after('sum_pending_withdrawals');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("dashboard_statistics", function(Blueprint $table)
		{
		    $table->dropColumn("count_pending_placements");
		    $table->dropColumn("sum_pending_placements");
		});
    }
}
