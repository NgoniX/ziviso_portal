<div class="portlet light">
    <div class="portlet-title">
        <div class="caption caption-md">
            <i class="icon-bar-chart theme-font-color hide"></i>
            <span class="caption-subject theme-font-color bold">Events Listing</span>
        </div>
    </div>
    <div class="portlet-body">
        <div id="myTable" class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Start
                    </th>
                    <th>
                        End
                    </th>
                    <th>
                        Added On
                    </th>
                    <th>
                        Groups
                    </th>
                    <th>
                        Details
                    </th>
                    @can('update', $event_class)
                        <th>
                            Edit
                        </th>
                    @endcan
                    @can('delete', $event_class)
                        <th>
                            Delete
                        </th>
                    @endcan

                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->title}}</td>
                        <td>{{$event->start_time->format('M d, Y g:i A')}}</td>
                        <td>{{$event->end_time->format('M d, Y g:i A')}}</td>
                        <td>{{$event->created_at->format('M d, Y')}}</td>
                        <td>
                            @foreach($event->groups as $group)
                                {{$group->name}}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{action('Client\EventsController@show', $event->id)}}">
                                <button class="btn btn-xs btn-success blue-chambray-stripe">Details <i class="fa fa-info-circle"></i></button>
                            </a>
                        </td>
                        @if(auth()->user()->can('update', $event_class))
                            <td>

                                <a href="{{action('Client\EventsController@edit', $event->id)}}">
                                    <button class="btn btn-xs btn-info green-jungle-stripe">Edit<i class="fa fa-pencil"></i></button>
                                </a>

                            </td>
                        @endif

                        @if(auth()->user()->can('delete', $event_class))
                            <td>
                                {!! Form::open([
                                'method'=>'DELETE',
                                'action'=>['Client\EventsController@destroy',$event->id],
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

