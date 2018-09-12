@extends('layouts.template')
@section('title')
    Edit Event
@endsection
@section('page_level_plugins_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css')}}"/>
@endsection
@section('page_level_css')

    <style>
        .input-mini{
            width: 100% !important;
        }
    </style>

@endsection
@section('side_bar_menu')
    @include('client._menu')
@endsection
@section('page_content_title')
    Events
    <small>new event</small>
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
        Edit
    </li>
@endsection
@section('page_content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box blue-madison">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit {{$event->title}}
            </div>

        </div>
        <div class="portlet-body">

            {!! Form::model($event, array(
            'action'=>['Client\EventsController@update', $event->id],
            'method'=>'PATCH',
            'class'=>'form-horizontal')) !!}
            <div class="form-body">

                @include('errors.list')

                @include('client.events._form')

            </div>

            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        {!! Form::submit('Save Event',['class'=>'btn green'])  !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
@endsection
@section('page_level_plugins_js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@endsection
@section('page_level_scripts_js')

@endsection
@section('page_level_inits_script')
    <script>
        jQuery(document).ready(function() {
            $('.select2').select2();
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    timePicker: true,
                    timePicker24Hour:true,
                    datePicker: false,
                    timePickerIncrement: 15,
                    minDate: moment(),
                    startDate: moment().add('hours', 1),
                    endDate: moment().add('days', 2),
                    locale: {
                        format: 'DD/MM/YYYY h:mm A'
                    }
                });
            });

        });
    </script>
@endsection