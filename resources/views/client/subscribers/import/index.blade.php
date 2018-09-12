
@extends('layouts.template')
@section('title')
    Import Subscribers
@endsection
@section('page_level_plugins_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css')}}"/>
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
        <a href="#">Subscribers</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Bulky Upload</a>
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
                        <i class="fa fa-globe"></i>Bulky Import Subscribers
                    </div>

                </div>
                <div class="portlet-body">

                    {!! Form::open(array(
                    'action'=>'Client\ImportController@save',
                    'files'=>true,
                    'class'=>'form-horizontal')) !!}
                    <div class="form-body">

                        @include('errors.list')

                        @include('client.subscribers.import._form')

                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                {!! Form::submit('Save Subscriber',['class'=>'btn green'])  !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <hr>

                    @include('client.subscribers.import._instructions')


                </div>
            </div>
            {{-- END EXAMPLE TABLE PORTLET--}}

        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@section('page_level_plugins_js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js')}}"></script>
@endsection
@section('page_level_scripts_js')

@endsection
@section('page_level_inits_script')
    <script>
        jQuery(document).ready(function (){
            $('.select2').select2();
        });
    </script>
@endsection