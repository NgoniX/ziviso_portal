@extends('layouts.template')
@section('title')
    Admin - Welcome
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('admin._menu')
@endsection
@section('page_content_title')
    System Administration
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{URL::to('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Admin</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{action('Admin\AdminController@index')}}">Dashboard</a>
    </li>
@endsection
@section('page_content')
    <!-- BEGIN PAGE CONTENT-->
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font-color hide"></i>
                            <span class="caption-subject theme-font-color bold uppercase">System Dashboard</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div id="users_container" class="row">

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('admin/clients')}}">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$clients->count()}}">{{$clients->count()}}</span>
                                        </div>
                                        <div class="desc"> Active Clients </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('admin/subscribers')}}">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$subscribers->count()}}">{{$subscribers->count()}}</span> </div>
                                        <div class="desc"> Total Subscribers </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue-chambray" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="0">0</span>
                                        </div>
                                        <div class="desc"> Subscriptions </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue-hoki" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$events->count()}}">{{$events->count()}}</span></div>
                                        <div class="desc"> Upcoming Events </div>
                                    </div>
                                </a>
                            </div>

                        </div>
{{---------------------------------------------------------------------------------------------------------------}}


                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT-->
@endsection
@section('page_level_plugins_js')


@endsection
@section('page_level_scripts_js')

@endsection
@section('page_level_inits_script')

@endsection