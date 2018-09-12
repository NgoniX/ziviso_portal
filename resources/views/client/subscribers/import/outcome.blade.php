
@extends('layouts.template')
@section('title')
    Import Results
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
        <a href="{{url('/')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Subscribers</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Bulky Upload</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Results</a>
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
                        <i class="fa fa-globe"></i>Bulky Import Results
                    </div>

                </div>
                <div class="portlet-body">

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-10">
                            <div class="btn-group col-md-2">
                                <a href="{{action('Client\ImportController@import')}}">
                                    <button class="btn btn-success">Bulky Import Again? <i class="fa fa-file-excel-o"></i></button>
                                </a>
                            </div>

                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Outcome</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($success as $person)
                            <tr>
                                <td>{{$person}}</td>
                                <td>Success</td>
                                <td>Subscriber saved successfully.</td>
                            </tr>
                        @endforeach

                        @foreach($errors as $error)
                            @foreach($error as $person=>$message)
                                <tr>
                                    <td>{{$person}}</td>
                                    <td>Error</td>
                                    <td>{{$message}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- END EXAMPLE TABLE PORTLET--}}

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
        jQuery(document).ready(function (){
        });
    </script>
@endsection