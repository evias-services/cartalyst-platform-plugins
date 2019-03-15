@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
{{{ trans('platform/dashboard::common.title') }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('selectize', 'selectize/css/selectize.bootstrap3.css', 'styles') }}
{{ Asset::queue('redactor', 'redactor/css/redactor.css', 'styles') }}
{{ Asset::queue('bootstrap-daterange', 'bootstrap/css/daterangepicker-bs3.css', 'style') }}
{{ Asset::queue('index', 'platform/dashboard::css/index.scss', 'style') }}

{{ Asset::queue('moment', 'moment/js/moment.js', 'jquery') }}
{{ Asset::queue('data-grid', 'cartalyst/js/data-grid.js', 'jquery') }}
{{ Asset::queue('underscore', 'underscore/js/underscore.js', 'jquery') }}
{{ Asset::queue('blog', 'evias/blog::js/blogGrid.js', 'platform') }}
{{ Asset::queue('bootstrap-daterange', 'bootstrap/js/daterangepicker.js', 'jquery') }}

{{ Asset::queue('slugify', 'platform/js/slugify.js', 'jquery') }}
{{ Asset::queue('validate', 'platform/js/validate.js', 'jquery') }}
{{ Asset::queue('selectize', 'selectize/js/selectize.js', 'jquery') }}
{{ Asset::queue('redactor', 'redactor/js/redactor.min.js', 'jquery') }}

{{ Asset::queue('index', 'evias/dashboard::css/dashboard-style.css', 'style') }}

{{-- Inline styles --}}
@section('styles')
@parent
@stop

{{-- Inline scripts --}}
@section('scripts')
@parent
@stop

{{-- Page content --}}
@section('page')

<div class="introduction">

	<section class="panel panel-default panel-grid">
		{{-- Grid: Header --}}
		<header class="panel-heading">
			<nav class="navbar navbar-default navbar-actions">
				<div class="container-fluid">
					<div class="navbar-header">
						<span class="navbar-brand">{{{ trans('evias/dashboard::common.admin_title', ['sitename' => config("platform.app.title")]) }}}</span>
					</div>
                    <div class="navbar-collpase" id="actions">
                        <div class="navbar-right">
                            <span class="navbar-brand">
                                <?php
                                $month = (int) date("n");
                                $dow   = (int) date("w");
                                if (!$dow)
                                    $dow = 7;
                                ?>
                                    <?php echo trans("evias/ewallet::settings.commission_withdrawal_day_" . $dow); ?>&nbsp;<?php echo date("d"); ?>&nbsp;<?php echo trans("evias/platform::dates/months.month_" . $month); ?>&nbsp;<?php echo date("Y"); ?>
                            </span>
                        </div>
                    </div>
				</div>
			</nav>
		</header>

		<div class="row" style="padding:1%;">

{{-- FIRST LINE OF WIDGETS --}}

			{{-- New Registrations this month --}}
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue">
					<div class="visual">
						<i class="fa fa-edit"></i>
					</div>
					<div class="details">
						<div class="number">
							+{{{ $newRegistrationsCount }}}
						</div>
						<div class="desc">
							{{{ trans('evias/dashboard::widget/label.new_registration_count') }}}
						</div>
					</div>
					<a class="more" href="javascript:;">
						&nbsp;
					</a>
				</div>
			</div>

			{{-- Active Users Count --}}
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat purple">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number" data-counter="counterup">
							{{{ $activeUsersCount }}}
						</div>
						<div class="desc">
							{{{ trans('evias/dashboard::widget/label.active_user_count') }}}
						</div>
					</div>
					<a class="more" href="javascript:;">
						<span>{{{ trans("evias/platform::dashboard.label_inactive") }}}:&nbsp;{{{ $inactiveUsersCount }}}</span>
						<span>&bull;</span>
						<span>{{{ trans("evias/platform::dashboard.label_blocked") }}}:&nbsp;{{{ $blockedUsersCount }}}</span>
					</a>
				</div>
			</div>

		</div>
	</section>

</div>

@stop
