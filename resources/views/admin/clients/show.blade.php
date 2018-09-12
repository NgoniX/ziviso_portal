@extends('layouts.template')
@section('title')
    {{ucwords($user->name)}} - Details
@endsection
@section('page_level_plugins_css')
@endsection
@section('page_level_css')
    <link href="{{ asset('assets/pages/css/profile.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('side_bar_menu')
    @include('admin._menu')
@endsection
@section('page_content_title')
    Student <small>details</small>
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{URL::to('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{action('Admin\AdminController@index')}}">Admin</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{action('Admin\ClientsController@index')}}">Clients</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Client Details</a>
    </li>
    @endsection
    @section('page_content')
            <!-- BEGIN PAGE CONTENT-->
    <div class="row">

        @include('flash::message')
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-graduation-cap font-green-sharp"></i>
                        <span class="caption-subject font-blue-sharp bold uppercase">
                            {{$user->name}}: <small>{{$user->client->description}}</small>
                        </span>
                        <span class="caption-helper">details</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li class="active">
                                <a href="#personal_details" data-toggle="tab">
                                    Client Details </a>
                            </li>
                            <li>
                                <a href="#subscribers" data-toggle="tab">
                                    Subscribers
                                </a>
                            </li>
                            <li>
                                <a href="#messages" data-toggle="tab">
                                    Messages
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal_details">
                                @include('admin.clients._personal_details')
                            </div>
                            <div class="tab-pane" id="subscribers">
                                @include('admin.clients._subscribers')
                            </div>
                            <div class="tab-pane" id="messages">
                                @include('admin.clients._messages')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@section('page_level_plugins_js')

@endsection
@section('page_level_scripts_js')

@endsection
@section('page_level_inits_script')
<script>
    jQuery(document).ready(function() {
        //
    });
</script>
@endsection