@extends('layouts.template')
@section('title')
    Users
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
        <a href="#">Users</a>
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
                        <i class="fa fa-globe"></i>System Users
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-10">
                            <div class="btn-group col-md-2">
                                <a href="{{action('Client\UsersController@create')}}">
                                    <button class="btn green">New User <i class="fa fa-plus-square"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="myTable" class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Created On
                                </th>

                                <th>
                                    Activation
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
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->format('M d, Y')}}</td>

                                    <td>
                                        {!! Form::open([
                                        'method'=>'PATCH',
                                        'action'=>['Client\UsersController@update',$user->id],
                                    ]) !!}
                                        <input type="hidden" name="deactivate" value="deactivate" class="" />

                                        <?php $val = $user->status=='active'?'Deactivate': 'Activate'; ?>

                                        {!! Form::submit($val, ['class' => 'btn btn-warning yellow-gold-stripe btn-xs confirm-deactivate',
                                        'data-confirm' => 'Are you sure you want to do this?']) !!}

                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        <a href="{{action('Client\UsersController@edit', $user->id)}}">
                                            <button class="btn btn-xs btn-info green-jungle-stripe">Edit<i class="fa fa-pencil"></i></button>
                                        </a>
                                    </td>

                                    <td>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'action'=>['Client\UsersController@destroy',$user->id],
                                    ]) !!}

                                        {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger red-stripe confirm-delete',
                                        'data-confirm' => 'Are you sure you want to delete?']) !!}

                                        {!! Form::close() !!}
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

            $('.confirm-deactivate').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

            $('.confirm-delete').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

        });
    </script>
@endsection