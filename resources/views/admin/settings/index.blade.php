@extends('layouts.template')
@section('title')
    Settings
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('admin._menu')
@endsection
@section('page_content_title')
    Settings
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{url('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Users</a>
    </li>
@endsection
@section('page_content')
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        @include('flash::message')
        <div class="col-md-12">
            {{-- BEGIN EXAMPLE TABLE PORTLET--}}
            <div class="portlet box blue-madison">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>System Settings
                    </div>

                </div>

                <div class="portlet-body">

                    <h2>No Settings Found!!</h2>

                </div>
            </div>
            {{-- END EXAMPLE TABLE PORTLET--}}

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