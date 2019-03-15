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

namespace eVias\Dashboard\Controllers\Admin;

use Cartalyst\Sentinel\Sentinel;
use Platform\Access\Controllers\AdminController;

use Platform\Users\Models\User;
use Platform\Users\Repositories\UserRepository;

use eVias\Dashboard\Models\DashboardStatistics;
use eVias\Dashboard\Helpers\InteractiveLabels;

use View;

use RuntimeException;
class DashboardController
    extends AdminController
{
	/**
     * The Cartalyst Sentinel instance.
     *
     * @var \Cartalyst\Sentinel\Sentinel
     */
	protected $sentinel;

	/**
     * The Platform Users repository.
     *
     * @var \Platform\Users\Repositories\UserRepository
     */
    protected $users;

    /**
     * Constructor.
     *
     * @param	\Cartalyst\Sentinel\Sentinel 									$sentinel
     * @return void
     */
    public function __construct(
    	Sentinel $sentinel,
    	UserRepository $users)
    {
        parent::__construct();

		$this->sentinel 	= $sentinel;
		$this->users 		= $users;
    }

    /**
	 * Return the main view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$currentUser      		= $this->users->find($this->sentinel->getUser()->id);

		if ($currentUser->inRole('manager-support') || $currentUser->inRole('manager-news'))
			return view('platform/dashboard::index', []);

		$memberId    		    = "EVS-" . $this->sentinel->getUser()->id;
		$statisticsAggregation  = DashboardStatistics::getStatisticsAggregation();

		$blogCount   		    	= $statisticsAggregation->count_blog_entries;
		$activeUsersCount       	= $statisticsAggregation->count_active_users;
		$inactiveUsersCount     	= $statisticsAggregation->count_inactive_users;
		$newRegistrationsCount  	= $statisticsAggregation->count_monthly_registrations;

		return view('evias/dashboard::index', [
			'blogCount'		=> $blogCount,
			'activeUsersCount'   	=> $activeUsersCount,
			'inactiveUsersCount'   	=> $inactiveUsersCount,
			"newRegistrationsCount"	=> $newRegistrationsCount,
		]);
	}

	/**
	 * returns a JSON response with field label_html for display in tooltips.
	 *
	 * @return JsonResponse
	 **/
	public function getInteractiveLabelWidget(InteractiveLabels $labelHelper)
	{
		$params = request()->all();

		if (empty($params['type']) || empty($params['oid']))
			return response()->json([
				'status' => 'error',
				'message' => [trans('evias/dashboard::interactive_labels.invalid_request')]]);

		$objectType = $params['type'];
		$objectId   = $params['oid'];

		try {
			$object   = $labelHelper->getObject(compact('objectType', 'objectId'));
			$viewSlug = "evias/dashboard::interactive_labels/" . $objectType;

			if (! View::exists($viewSlug))
				throw new \InvalidArgumentException("View '" . $objectType . "' not found.");

			$html = (string) View::make($viewSlug, compact('object'));

			return response()->json([
				'status' 	 => 'ok',
				'label_html' => $html]);
		}
		catch (\Exception $e) {
			return response()->json([
				'status' => 'error',
				'message' => [trans('evias/dashboard::interactive_labels.invalid_request')]]);
		}
	}
}
