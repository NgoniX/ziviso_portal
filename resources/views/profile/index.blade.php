<?php
use App\Helpers\PrintHelper;
$url = '/';
if(auth()->user()->type=='admin' or auth()->user()->type=='admin-assistant'){
    $url = '/admin';
}
elseif (auth()->user()->type=='client' or auth()->user()->type=='client-assistant'){
    $url = '/client';
}
?>
@extends('layouts.template')
@section('title')
    My Profile
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
    <link href="{{ asset('assets/pages/css/profile.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('side_bar_menu')

    <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="start">
            <a href="{{url($url)}}">
                <i class="icon-home font-blue"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
    </ul>

@endsection
@section('page_content_title')
    My Profile
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{URL::to('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>

    <li>
        <a href="#">Profile</a>
    </li>
@endsection
@section('page_content')
    <!-- BEGIN PAGE CONTENT-->
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="col-md-12">
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#profile" data-toggle="tab" aria-expanded="false">Personal Info</a>
                                            </li>
                                            <li class="">
                                                <a href="#pass" data-toggle="tab" aria-expanded="false">Change Password</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="profile">

                                                <table class="table table-borderless">
                                                    {{PrintHelper::reverse_static_info('Full Name', $user->name)}}
                                                    {{PrintHelper::reverse_static_info('Username', $user->username)}}
                                                    {{PrintHelper::reverse_static_info('Status', ucfirst($user->status))}}
                                                    {{PrintHelper::reverse_static_info('Email', $user->email)}}
                                                    {{PrintHelper::reverse_static_info('Phone', $user->phone)}}
                                                    {{PrintHelper::reverse_static_info('Date created', $user->created_at->format('M d, Y'), 4)}}
                                                    {{PrintHelper::reverse_static_info('Last Updated', $user->updated_at->format('M d, Y'))}}

                                                    @if(!is_null($logo))
                                                        <tr class="static-info">
                                                            <td class="col-md-2 value" style="border: none !important;">
                                                                Logo:
                                                            </td>
                                                            <td class="name" style="border: none !important;">
                                                                <div class="profile-userpic">
                                                                    <img src="{{ asset($logo) }}" alt="LOGO" class="logo-default"
                                                                         style="width: 70px; height: 70px;"/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </table>

                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="pass">

                                                <form method="POST" action="{{url('/profile')}}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label class="control-label" for="old_password">Current Password</label>
                                                        <input type="password" name="old_password" id="old_password" required class="form-control"> </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="password">New Password</label>
                                                        <input type="password" name="password" id="password" required pattern=".{5,}" title="At least 5 characters" class="form-control"> </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="password_confirmation">Re-type New Password</label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation" required pattern=".{5,}" title="At least 5 characters" class="form-control"> </div>
                                                    <div class="margin-top-10">
                                                        <input type="submit" class="btn btn-success" value="Change Password">
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
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