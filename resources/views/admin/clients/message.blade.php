@php
    use App\Helpers\PrintHelper;
@endphp

@extends('layouts.template')
@section('title')
    Message - Details
@endsection
@section('page_level_plugins_css')
@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('admin._menu')
@endsection
@section('page_content_title')
    Message <small>details</small>
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
        <i class="fa fa-circle"></i>
        <a href="#">Client Messages</a>
    </li>
    <li>
        <a href="#">View Message</a>
    </li>
@endsection
@section('page_content')
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">

        @include('flash::message')
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue-madison">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>{{$message->title}} <small>details</small>
                    </div>

                </div>
                <div class="portlet-body">

                    <table class="table table-borderless">
                        {{PrintHelper::reverse_static_info('Client', $message->client->user->name)}}
                        {{PrintHelper::reverse_static_info('Status', $message->stat)}}
                        {{PrintHelper::reverse_static_info('Title', $message->title)}}
                        {{PrintHelper::reverse_static_info('Details', $message->details)}}
                        {{PrintHelper::reverse_static_info('Created By', $message->user->name)}}
                        {{PrintHelper::reverse_static_info('Date Created', $message->created_at->format(' M d, Y g:i A'))}}
                        <tr class="static-info">
                            <td class="value" style="border: none !important;">
                                Target:
                            </td>
                            <td class="name" style="border: none !important;">
                                @foreach($message->groups as $group)
                                   {{$group->name}}  <br>
                                @endforeach
                            </td>
                        </tr>

                    </table>

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