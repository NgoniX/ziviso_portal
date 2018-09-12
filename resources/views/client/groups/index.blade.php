@extends('layouts.template')
@section('title')
    Groups
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
        <a href="#">Groups</a>
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
                        <i class="fa fa-globe"></i>All Groups
                    </div>

                </div>
                <div class="portlet-body">
                    @can('create', $group_class)
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-10">
                            <div class="btn-group col-md-2">
                                <a href="{{action('Client\GroupsController@create')}}">
                                    <button class="btn green">New Group <i class="fa fa-plus-square"></i></button>
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
                                    Name
                                </th>
                                <th>
                                    Join Criteria
                                </th>
                                <th>
                                    Subscribers
                                </th>
                                <th>
                                    Messages
                                </th>
                                <th>
                                    Created By
                                </th>
                                <th>
                                    Created On
                                </th>
                                <th>
                                    Details
                                </th>
                                @can('update', $group_class)
                                    <th>
                                        Edit
                                    </th>
                                @endcan
                                @can('delete', $group_class)
                                    <th>
                                        Delete
                                    </th>
                                @endcan

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{$group->name}}</td>
                                    <td>{{ucfirst($group->join_criteria)}}</td>
                                    <td>
                                        {{$group->subscribers->count()}}
                                    </td>
                                    <td>{{$group->messages->count()}}</td>
                                    <td>{{$group->creator->name}}</td>
                                    <td>{{$group->created_at->format('M d, Y')}}</td>
                                    <td>
                                        <a href="{{action('Client\GroupsController@show', $group->id)}}">
                                            <button class="btn btn-xs btn-success blue-chambray-stripe">Details <i class="fa fa-info-circle"></i></button>
                                        </a>
                                    </td>
                                    @if(auth()->user()->can('update', $group_class))
                                        <td>

                                            <a href="{{action('Client\GroupsController@edit', $group->id)}}">
                                                <button class="btn btn-xs btn-info green-jungle-stripe">Edit<i class="fa fa-pencil"></i></button>
                                            </a>

                                        </td>
                                    @endif

                                    @if(auth()->user()->can('delete', $group_class))
                                        <td>
                                            {!! Form::open([
                                            'method'=>'DELETE',
                                            'action'=>['Client\GroupsController@destroy',$group->id],
                                        ]) !!}

                                            {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger red-stripe confirm-delete',
                                            'data-confirm' => 'Are you sure you want to delete?']) !!}

                                            {!! Form::close() !!}
                                        </td>
                                    @endif
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