@php
$count=0;
@endphp

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Title</th>
        <th>Sender</th>
        <th>Target</th>
        <th>Status</th>
        <th>Details</th>
    </tr>
    </thead>

    <tbody>
    @foreach($group->messages as $message)
        <tr>
            <td>{{++$count}}</td>
            <td>{{ucfirst($message->type)}}</td>
            <td>{{$message->title}}</td>
            <td>{{$message->user->name}}</td>
            <td>{{ucfirst($message->target)}}</td>
            <td>{{ucfirst($message->stat)}}</td>
            <td>
                <a href="{{action('Client\MessagesController@show', $message->id)}}">
                    <button class="btn btn-xs btn-success blue-chambray-stripe">View <i class="fa fa-info-circle"></i></button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>