@extends('layouts.template')
@section('title')
    Admin - Clients
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
                        <i class="fa fa-globe"></i>All Clients
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-10">
                            <div class="btn-group col-md-2">
                                <a href="{{action('Admin\ClientsController@create')}}">
                                    <button class="btn green">New Clients <i class="fa fa-plus-square"></i></button>
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
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Subscription
                                </th>
                                <th>
                                    Subscribers
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Activation
                                </th>
                                <th>
                                    Delete
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->client->country->name}}</td>
                                    <td>{{ucfirst($client->status)}}</td>
                                    <td>
                                        Active
                                    </td>
                                    <td>{{$client->subscribers->count()}}</td>
                                    <td>
                                        <a href="{{action('Admin\ClientsController@show', $client->id)}}">
                                            <button class="btn btn-xs btn-success blue-chambray-stripe">Details <i class="fa fa-info-circle"></i></button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{action('Admin\ClientsController@edit', $client->id)}}">
                                            <button class="btn btn-xs btn-info green-jungle-stripe">Edit<i class="fa fa-pencil"></i></button>
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open([
                                        'method'=>'PATCH',
                                        'action'=>['Admin\ClientsController@update',$client->id],
                                    ]) !!}
                                        <input type="hidden" name="deactivate" value="deactivate" class="" />

                                        <?php $val = $client->status=='active'?'Deactivate': 'Activate'; ?>

                                        {!! Form::submit($val, ['class' => 'btn btn-warning yellow-gold-stripe btn-xs confirm-deactivate',
                                        'data-confirm' => 'Are you sure you want to do this?']) !!}

                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'action'=>['Admin\ClientsController@destroy',$client->id],
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
            //alert('ready');
            $('.confirm-deactivate').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });

            $('.confirm-delete').on('click', function (e) {
                return !!confirm($(this).data('confirm'));
            });
        });
    </script>
@endsection