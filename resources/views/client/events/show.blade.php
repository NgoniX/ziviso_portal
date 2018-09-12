@php
    use App\Helpers\PrintHelper;

@endphp
@extends('layouts.template')
@section('title')
    {{$event->title}}
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')

@endsection
@section('side_bar_menu')
    @include('client._menu')
@endsection
@section('page_content_title')
    Events
    <small>details</small>
@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{URL::to('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{action('Client\EventsController@index')}}">Events</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        View
    </li>
@endsection
@section('page_content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box blue-madison">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i> {{$event->title}}
            </div>

        </div>
        <div class="portlet-body">

            <table class="table table-borderless">
                {{PrintHelper::reverse_static_info('Title', $event->title)}}
                {{PrintHelper::reverse_static_info('Created By', $event->user->name)}}
                {{PrintHelper::reverse_static_info('Created On', $event->created_at->format('M d, Y'))}}
                {{PrintHelper::reverse_static_info('Start Time', $event->start_time->format('M d, Y g:i A'))}}
                {{PrintHelper::reverse_static_info('End Time', $event->end_time->format('M d, Y g:i A'))}}
                <tr class="static-info">
                    <td class="col-md-'.$col_md.' value" style="border: none !important;">
                        Target Groups:
                    </td>
                    <td class="name" style="border: none !important;">
                        @foreach($event->groups as $group)
                            {{$group->name}} <br>
                        @endforeach
                    </td>
                </tr>
                {{PrintHelper::reverse_static_info('Details', $event->details, 4)}}
            </table>

        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
@endsection
@section('page_level_plugins_js')

@endsection
@section('page_level_scripts_js')

@endsection
@section('page_level_inits_script')

@endsection