<?php
use App\Helpers\PrintHelper;
?>
@extends('layouts.template')
@section('title')
    {{$subscriber->user->name}}
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('client._menu')
@endsection
@section('page_content_title')
    {{$subscriber->user->name}} <small>{{$subscriber->profile}}</small>
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{url('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <i class="fa fa-circle"></i>
        <a href="{{url('/client/subscribers')}}">Subscribers</a>
    </li>
    <li>
        <a href="#">View</a>
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
                            <span class="caption-subject font-blue-madison bold uppercase">{{$subscriber->user->name}}</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#info" data-toggle="tab" aria-expanded="false">Subscriber Info</a>
                            </li>

                            <li class="">
                                <a href="#groups" data-toggle="tab" aria-expanded="false">Groups</a>
                            </li>

                            <li class="">
                                <a href="#messages" data-toggle="tab" aria-expanded="false">Messages</a>
                            </li>

                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                @include('client.subscribers._info')
                            </div>

                            <div class="tab-pane" id="groups">
                                @include('client.subscribers._groups')
                            </div>

                            <div class="tab-pane" id="messages">
                                @include('client.subscribers._messages')
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