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

class CreateDashboardAggregation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_statistics', function(Blueprint $table)
		{
			$table->integer('count_blog_entries')->unsigned();
			$table->integer('count_active_users')->unsigned();
			$table->integer('count_inactive_users')->unsigned();
			$table->integer('count_monthly_registrations')->unsigned();
			$table->integer('count_pending_withdrawals')->unsigned();
			$table->decimal('sum_ewallet_balances_active', 12, 2);
			$table->decimal('sum_ewallet_balances_inactive', 12, 2);
			$table->decimal('sum_commission_balances_active', 12, 2);
			$table->decimal('sum_commission_balances_inactive', 12, 2);
			$table->decimal('sum_placements_active', 12, 2);
			$table->decimal('sum_placements_inactive', 12, 2);
			$table->decimal('sum_last_interests_paid', 12, 2);
			$table->decimal('sum_pending_withdrawals', 12, 2);
			$table->decimal('sum_monthly_withdrawals', 12, 2);
			$table->decimal('sum_monthly_placements', 12, 2);
		});

		DB::table("dashboard_statistics")->insert([
			'count_blog_entries' 				=> 0,
			'count_active_users' 				=> 0,
			'count_inactive_users' 				=> 0,
			'count_monthly_registrations' 		=> 0,
			'count_pending_withdrawals' 		=> 0,
			'sum_ewallet_balances_active' 		=> 0.00,
			'sum_ewallet_balances_inactive'		=> 0.00,
			'sum_commission_balances_active'	=> 0.00,
			'sum_commission_balances_inactive'	=> 0.00,
			'sum_placements_active'				=> 0.00,
			'sum_placements_inactive'			=> 0.00,
			'sum_last_interests_paid'			=> 0.00,
			'sum_pending_withdrawals'			=> 0.00,
			'sum_monthly_withdrawals'			=> 0.00,
			'sum_monthly_placements'			=> 0.00,
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("dashboard_statistics");
    }
}
