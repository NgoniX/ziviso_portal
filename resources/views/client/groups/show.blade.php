<?php
use App\Helpers\PrintHelper;
?>
@extends('layouts.template')
@section('title')
    {{$group->name}}
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('client._menu')
@endsection
@section('page_content_title')
    {{$group->name}} <small>{{$group->description}}</small>
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{url('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <i class="fa fa-circle"></i>
        <a href="{{url('/client/groups')}}">Groups</a>
    </li>
    <li>
        <a href="{{url('/client/groups')}}">View</a>
    </li>
@endsection
@section('page_content')
    <!-- BEGIN PAGE CONTENT-->
    <div class="page-content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">{{$group->name}}</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#info" data-toggle="tab" aria-expanded="false">Group Info</a>
                            </li>

                            <li class="">
                                <a href="#subscribers" data-toggle="tab" aria-expanded="false">Subscribers</a>
                            </li>

                            @can('update', $group_class)
                            <li class="">
                                <a href="#add_subscribers" data-toggle="tab" aria-expanded="false">Add Subscribers</a>
                            </li>
                            @endcan

                            <li class="">
                                <a href="#messages" data-toggle="tab" aria-expanded="false">Messages</a>
                            </li>

                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                @include('client.groups._info')
                            </div>

                            <div class="tab-pane" id="subscribers">
                                @include('client.groups._subscribers')
                            </div>

                            @can('update', $group_class)
                            <div class="tab-pane" id="add_subscribers">
                                @include('client.groups._add_subscribers')
                            </div>
                            @endcan

                            <div class="tab-pane" id="messages">
                                @include('client.groups._messages')
                            </div>
                        </div>
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