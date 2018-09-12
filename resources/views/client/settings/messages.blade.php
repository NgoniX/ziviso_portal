@extends('layouts.template')
@section('title')
     Settings
@endsection

@section('page_level_plugins_css')

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
        <a href="{{URL::to('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>

    <li>
        <a href="#">Settings</a>
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
                        <i class="fa fa-globe"></i>System Settings
                    </div>

                </div>
                <div class="portlet-body">

                    {!! Form::model($message_setting, array(
                    'action'=>['Client\SettingsController@update', $message_setting->id],
                    'method'=>'PATCH',
                    'class'=>'form-horizontal')) !!}
                    <div class="form-body">

                        @include('errors.list')

                        <div class="form-group">
                            {!!Html::decode(Form::label('status', 'Messages Auto-Send:<span class="required"> * </span>', ['class'=>'control-label col-md-4']))!!}
                            <div class="col-md-5">
                                {!!Form::select('status', ['1'=>'Send Automatically', '0'=>'Do not send Automatically' ], null,
                                ['class'=>'form-control', 'required'])!!}
                                <span class="help-block" style="font-size: 12px"><em>Send automatically means that anyone be can send messages. No approval is required</em></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                {!! Form::submit('Save Settings',['class'=>'btn green'])  !!}
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
        jQuery(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection