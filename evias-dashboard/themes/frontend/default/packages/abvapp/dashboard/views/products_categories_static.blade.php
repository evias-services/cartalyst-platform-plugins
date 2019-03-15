@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
{{{ trans('platform/dashboard::common.title') }}}
@stop

{{ Asset::queue('selectize', 'selectize/css/selectize.bootstrap3.css', 'styles') }}
{{ Asset::queue('redactor', 'redactor/css/redactor.css', 'styles') }}
{{ Asset::queue('bootstrap-daterange', 'bootstrap/css/daterangepicker-bs3.css', 'style') }}
{{ Asset::queue('index', 'platform/dashboard::css/index.scss', 'style') }}

{{ Asset::queue('moment', 'moment/js/moment.js', 'jquery') }}
{{ Asset::queue('data-grid', 'cartalyst/js/data-grid.js', 'jquery') }}
{{ Asset::queue('underscore', 'underscore/js/underscore.js', 'jquery') }}
{{ Asset::queue('bootstrap-daterange', 'bootstrap/js/daterangepicker.js', 'jquery') }}

{{-- Queue Assets --}}
{{ Asset::queue('index', 'evias/dashboard::css/dashboard-style.css', 'style') }}


{{-- Inline styles --}}
@section('styles')
@parent
<style type="text/css">
.page .container .panel .panel-heading { padding:0; }
.page .container .panel .panel-heading nav { margin-bottom:0; }
.page .container .panel .panel-body { padding:0; }
</style>
@stop

{{-- Inline scripts --}}
@section('scripts')
@parent
@stop
{{-- Page content --}}
@section('page')

<div class="panel panel-default panel-grid">
	<div class="panel-heading">

        <nav class="navbar navbar-default navbar-actions">

            <div class="container-fluid">

                <div class="navbar-header">
                    <span class="navbar-brand">{{{ trans('evias/dashboard::products.title') }}}</span>

                </div>
            </div>
        </nav>
    </div>

	<div class="row" style="padding:1%;">

{{-- FIRST LINE OF WIDGETS --}}

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-plug"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[0] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-skyatlas"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[1] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-fire"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[2] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-car"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[3] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

{{-- SECOND LINE OF WIDGETS --}}

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow">
                <div class="visual">
                    <i class="fa fa-car"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[4] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-dark">
                <div class="visual">
                    <i class="fa fa-car"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[5] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat grey">
                <div class="visual">
                    <i class="fa fa-leaf"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[6] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow-gold">
                <div class="visual">
                    <i class="fa fa-plane"></i>
                </div>
                <div class="details">
                    <div class="number">{{ $productCategories[7] }}</div>
                    <div class="desc">&nbsp;</div>
                </div>
                <a class="more" href="javascript:;">
                &nbsp;
                </a>
            </div>
        </div>

	</div> <!-- end .row -->
</div>

@stop
