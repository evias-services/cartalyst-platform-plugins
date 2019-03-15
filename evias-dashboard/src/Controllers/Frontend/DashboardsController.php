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

namespace eVias\Dashboard\Controllers\Frontend;

use Platform\Foundation\Controllers\Controller;
use Cartalyst\Sentinel\Sentinel;

use Platform\Users\Repositories\UserRepository;
use Platform\Users\Models\User;

use RuntimeException;

class DashboardsController
	extends Controller
{

	/**
     * The Cartalyst Sentinel instance.
     *
     * @var \Cartalyst\Sentinel\Sentinel
     */
    protected $sentinel;

    /**
	 * The Extended User repository.
	 *
	 * @var \Platform\Users\Repositories\UserRepository
	 */
	protected $users;

    /**
     * Constructor.
     *
     * @param	\Cartalyst\Sentinel\Sentinel 									$sentinel
     * @param	\Platform\Users\Repositories\UserRepository					$users
     * @return void
     */
    public function __construct(
    	Sentinel $sentinel,
    	AffiliateRepository $users)
    {
        parent::__construct();

        $this->sentinel 	= $sentinel;
        $this->users 		= $users;
    }

	/**
	 * Return the main dashboard view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
        if (! $this->sentinel->check())
            return redirect('/login');

		$currentUser       = User::where("id", $this->sentinel->getUser()->id)->first();
        if ($currentUser->isCompanyAccount())
            return redirect(admin_uri());

        $directChildrenCnt = count($currentUser->getDirectChildren());

		$memberId  = $currentUser->prefixed_id;
		$blogCount = $this->blogs->getCountBlogEntries();

		return view('evias/dashboard::index', [
			'downline' 		=> $directChildrenCnt,
			'memberId'		=> $memberId,
			'blogCount'		=> $blogCount,
		]);
	}

	/**
	 * Return the products dashboard view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function products()
	{
        if (! $this->sentinel->check())
            return redirect('/login');

		$currentUser = User::where("id", $this->sentinel->getUser()->id)->first();
        if ($currentUser->isCompanyAccount())
            return redirect(admin_uri);

        $productCategories = [
			trans('evias/dashboard::products/categories.electricity'),
			trans('evias/dashboard::products/categories.gaz'),
			trans('evias/dashboard::products/categories.heater'),
			trans('evias/dashboard::products/categories.car_leasing'),
			trans('evias/dashboard::products/categories.car_renting'),
			trans('evias/dashboard::products/categories.car_buying'),
			trans('evias/dashboard::products/categories.health'),
			trans('evias/dashboard::products/categories.travel'),
        ];

		return view('evias/dashboard::products_categories_static', compact('productCategories'));
	}

}
