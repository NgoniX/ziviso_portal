@php
    use App\Helpers\ClientHelper;
    $count=0;

    $client = ClientHelper::getInstance();
@endphp

@extends('layouts.template')
@section('title')
    Group Join Requests
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
        <a href="#">Requests</a>
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
                        <i class="fa fa-globe"></i>Group Joining Requests
                    </div>

                </div>
                <div class="portlet-body">

                    <div id="myTable" class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Subscriber
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Group
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$request->subscriber->user->name}}</td>
                                    <td>{{$request->subscriber->user->email}}</td>
                                    <td>{{$request->subscriber->user->phone}}</td>
                                    <td>{{$request->group->name}}</td>
                                    <td>
                                        <div>
                                            <div class="col-md-1">
                                                {!! Form::open([
                                                'method'=>'PATCH',
                                                'action'=>['Client\RequestsController@update',$request->id],
                                            ]) !!}
                                                <input type="hidden" name="approve" value="approve" class="" />

                                                {!! Form::submit('Accept', ['class' => 'btn btn-success btn-xs confirm-action',
                                                'data-confirm' => 'Are you sure you want to accept?']) !!}

                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-md-1 col-md-offset-2">
                                                {!! Form::open([
                                                'method'=>'PATCH',
                                                'action'=>['Client\RequestsController@update',$request->id],
                                            ]) !!}
                                                <input type="hidden" name="reject" value="reject" class="" />

                                                {!! Form::submit('Reject', ['class' => 'btn btn-danger btn-xs confirm-action',
                                                'data-confirm' => 'Are you sure you want to reject?']) !!}

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

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

            $('.confirm-action').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

        });
    </script>
@endsection