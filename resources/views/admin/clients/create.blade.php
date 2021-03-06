@extends('layouts.template')
@section('title')
    Admin - New Client
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
@endsection
@section('side_bar_menu')
    @include('admin._menu')
@endsection
@section('page_content_title')

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
    </li>
    <li>
        <a href="#">New Client</a>
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
                        <i class="fa fa-globe"></i>New Client
                    </div>

                </div>
                <div class="portlet-body">

                    {!! Form::open(array(
                    'action'=>'Admin\ClientsController@store',
                     'files'=>true,
                    'class'=>'form-horizontal')) !!}
                    <div class="form-body">

                        @include('errors.list')

                        @include('admin.clients._form')

                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                {!! Form::submit('Save Client',['class'=>'btn green'])  !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

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
        //
    </script>
@endsection