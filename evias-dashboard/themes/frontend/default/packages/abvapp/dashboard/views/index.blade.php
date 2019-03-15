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

{{-- Grid --}}
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default panel-grid">
        {{-- Grid: Header --}}
        <div class="panel-heading">

            <nav class="navbar navbar-default navbar-actions">

                <div class="container-fluid">

                    <div class="navbar-header">
                        <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#actions">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>-->

                        <span class="navbar-brand">{{{ trans('platform/dashboard::common.title') }}}</span>

                    </div>
                </div>
            </nav>
        </div>
        <div class="row" style="padding:1%;">
            {{-- Downline --}}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{{ $downline }}}
                        </div>
                        <div class="desc">
                            {{{ trans('evias/dashboard::widget/label.downline') }}}
                        </div>
                    </div>
                    <a class="more" href="javascript:;">
                        &nbsp;
                    </a>
                </div>
            </div>
            {{-- Member --}}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-user-secret"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{{ $memberId }}}
                        </div>
                        <div class="desc">
                           {{{ trans('evias/dashboard::widget/label.member_id') }}}
                        </div>
                    </div>
                    <a class="more" href="javascript:;">
                        &nbsp;
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
