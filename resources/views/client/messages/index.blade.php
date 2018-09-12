@php
    $count=0;
@endphp

@extends('layouts.template')
@section('title')
    Messages
@endsection
@section('page_level_plugins_css')

@endsection
@section('page_level_css')
    <style>
        .nowrap{
            white-space: nowrap;
        }
    </style>
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
        <a href="#">Messages</a>
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
                        <i class="fa fa-globe"></i>Messages
                    </div>

                </div>
                <div class="portlet-body">

                    @can('create', $message_class)
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-10">
                                <div class="btn-group col-md-2">
                                    <a href="{{action('Client\MessagesController@create')}}">
                                        <button class="btn green">New Message <i class="fa fa-plus-square"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endcan

                    <div id="myTable" class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Created By
                                </th>
                                <th>
                                    Added
                                </th>
                                <th>
                                    Target
                                </th>
                                <th>
                                    Status
                                </th>
                                @can('authorizeSend', $message_class)
                                <th>
                                    Approval
                                </th>
                                @endcan
                                <th>
                                    Details
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{ucfirst($message->type)}}</td>
                                    <td class="nowrap">{{$message->title}}</td>
                                    <td class="nowrap">{{$message->user->name}}</td>
                                    <td class="nowrap">{{$message->user->created_at->format('M d, Y')}}</td>
                                    <td class="nowrap">{{ucfirst($message->target)}}</td>
                                    <td>{{$message->stat}}</td>
                                    @can('authorizeSend', $message_class)
                                    <td>
                                        @if($message->authorized == '1')
                                            <button class="btn btn-xs btn-default">Approve</button>
                                        @else
                                            {!! Form::open(['method'=>'PATCH','action'=>['Client\MessagesController@update',$message->id],
                                                                                ]) !!}

                                            <input type="hidden" name="authorize" value="authorize" />

                                            {!! Form::submit('Approve', ['class' => 'btn btn-xs btn-primary confirm-deactivate',
                                            'data-confirm' => 'Are you sure you want to do this?']) !!}

                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    @endcan
                                    <td>
                                        <a href="{{action('Client\MessagesController@show', $message->id)}}">
                                            <button class="btn btn-xs btn-success blue-chambray-stripe">Details <i class="fa fa-info-circle"></i></button>
                                        </a>
                                    </td>
                                    <td>
                                        @if($message->status=='0' and auth()->user()->can('update', $message))
                                            <a href="{{action('Client\MessagesController@edit', $message->id)}}">
                                                <button class="btn btn-xs btn-info green-jungle-stripe">Edit<i class="fa fa-pencil"></i></button>
                                            </a>
                                        @else
                                            <button class="btn btn-xs btn-warning red-stripe">Edit<i class="fa fa-pencil"></i></button>
                                        @endif
                                    </td>

                                    <td>
                                        @if(auth()->user()->can('delete', $message))
                                            {!! Form::open(['method'=>'DELETE','action'=>['Client\MessagesController@destroy',$message->id]]) !!}

                                            {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger yellow-gold-stripe  confirm-delete',
                                            'data-confirm' => 'Are you sure you want to delete?']) !!}

                                            {!! Form::close() !!}
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$messages->links()}}
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

            $('.confirm-delete').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

        });
    </script>
@endsection
