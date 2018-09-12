@extends('layouts.template')
@section('title')
    Events
@endsection
@section('page_level_plugins_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')}}"/>
@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('client._menu')
@endsection
@section('page_content_title')

@endsection
@section('page_breadcrumb')
    <li>
        <a href="{{url('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Events</a>
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
                        <i class="fa fa-gift"></i>My Calendar Events
                    </div>
                </div>
                <div class="portlet-body">

                    <!--Begin Calender------------------------------->
                    <div class="row">
                        <div class="col-md-2 col-sm-3">
                            <button class="btn btn-info btn-sm" id="eventsListBtn">Events List</button>
                            @can('create', $event_class)
                                <div style="padding-top: 15px;">
                                    <a href="{{action('Client\EventsController@create')}}">
                                        <button class="btn btn-sm green">New Event </button>
                                    </a>
                                </div>

                            @endcan
                        </div>
                        <div class="col-md-10 col-sm-9">
                            <style>
                                .fc-event{
                                    font-size: 15px;
                                }
                            </style>
                            <div id="calendar" style="display: block"></div>
                            <div id="calendarList" style="display: none;">@include('client.events._events_list')</div>
                        </div>
                    </div>
                    <!--End calender Events-------------------------------->

                </div>
            </div>
            {{-- END EXAMPLE TABLE PORTLET--}}

        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@section('page_level_plugins_js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/fullcalendar/lib/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
@endsection
@section('page_level_scripts_js')

@endsection
@section('page_level_inits_script')
    <script>
        jQuery(document).ready(function (){

            var btn= $('#eventsListBtn');
            var calendarList = $('#calendarList');
            var calendar = $('#calendar');


            btn.click(function () {
                if(calendarList.css('display')=='none'){
                    calendar.css('display', 'none');
                    calendarList.css('display', 'block');
                    btn.html('Calendar');
                }
                else{
                    calendar.css('display', 'block');
                    calendarList.css('display', 'none');
                    btn.html('Events List');
                }

            });

            var base_url = '{{ url('client/events') }}';

            calendar.fullCalendar({
                weekends: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: "{{url('/client/events/api')}}",
                    error: function() {
                        alert("cannot load json");
                    }
                }
            });

            $('.confirm-delete').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

        });
    </script>
@endsection