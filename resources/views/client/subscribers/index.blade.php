@php
    use App\Helpers\ClientHelper;
    $count=0;

    $client = ClientHelper::getInstance();
@endphp

@extends('layouts.template')
@section('title')
    Subscribers
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
                        <i class="fa fa-globe"></i>Active Subscribers
                    </div>

                </div>
                <div class="portlet-body">

                    @can('create', $subscriber_class)
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-10">
                                <div class="btn-group col-md-2">
                                    <a href="{{action('Client\SubscribersController@create')}}">
                                        <button class="btn green">New Subscriber <i class="fa fa-plus-square"></i></button>
                                    </a>
                                </div>

                                <div class="btn-group col-md-2 col-md-offset-1">
                                    <a href="{{action('Client\ImportController@import')}}">
                                        <button class="btn btn-primary">Import From File <i class="fa fa-file-excel-o"></i></button>
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
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    Groups
                                </th>
                                <th>
                                    Details
                                </th>
                                @can('create', $subscriber_class)
                                    <th>
                                        Edit
                                    </th>
                                @endcan
                                @can('delete', $subscriber_class)
                                    <th>
                                        Remove
                                    </th>
                                @endcan

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$subscriber->user->name}}</td>
                                    <td>{{$subscriber->user->email}}</td>
                                    <td>{{$subscriber->user->phone}}</td>
                                    <td>{{$subscriber->country->name}}</td>
                                    <td>
                                        @foreach($subscriber->groups as $group)
                                            @if($client->clientOwnsGroup($group->id))
                                                <span style="white-space: nowrap">{{$group->name}}</span><br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{action('Client\SubscribersController@show', $subscriber->id)}}">
                                            <button class="btn btn-xs btn-success blue-chambray-stripe">Details <i class="fa fa-info-circle"></i></button>
                                        </a>
                                    </td>
                                    @can('update', $subscriber_class)
                                        <td>
                                            @if($client->subscriberBelongsToClient($subscriber->id))
                                                <a href="{{action('Client\SubscribersController@edit', $subscriber->id)}}">
                                                    <button class="btn btn-xs btn-info green-jungle-stripe">Edit<i class="fa fa-pencil"></i></button>
                                                </a>
                                            @else
                                                <button class="btn btn-xs btn-default yellow-casablanca-stripe">Edit<i class="fa fa-pencil"></i></button>
                                            @endif
                                        </td>
                                    @endcan

                                    @can('delete', $subscriber_class)
                                        <td>
                                            {!! Form::open([
                                            'method'=>'PATCH',
                                            'action'=>['Client\SubscribersController@update',$subscriber->user->id],
                                        ]) !!}
                                            <input type="hidden" name="remove" value="remove" />

                                            {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger red-stripe confirm-delete',
                                            'data-confirm' => 'Are you sure you want to delete this subscriber?']) !!}

                                            {!! Form::close() !!}
                                        </td>
                                    @endcan
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

            $('.confirm-delete').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

        });
    </script>
@endsection