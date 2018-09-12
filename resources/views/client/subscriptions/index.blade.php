@extends('layouts.template')
@section('title')
    Subscriptions
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('admin._menu')
@endsection
@section('page_content_title')
    Subscriptions
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{URL::to('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{url('/client')}}">Dashboard</a>
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
                            <span class="caption-subject theme-font-color bold uppercase">My Subscriptions</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Expiration Date</th>
                                    <th>Details</th>
                                    <th>Reminder</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


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