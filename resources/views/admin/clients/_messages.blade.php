@php
    $count=0;
    $messages = $user->client->messages()->latest('created_at')->get();
@endphp

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Title</th>
        <th>To</th>
        <th>Status</th>
        <th>View</th>
    </tr>
    </thead>

    <tbody>
    @foreach($messages as $message)
        <tr>
            <td>{{++$count}}</td>
            <td>{{ucfirst($message->type)}}</td>
            <td>{{$message->title}}</td>
            <td>{{ucfirst($message->target)}}</td>
            <td>{{$message->stat}}</td>
            <td>
                <a href="{{action('Admin\ClientsController@showMessage', $message->id)}}">
                    <button class="btn btn-xs btn-info">Details <i class="fa fa-info-circle"></i></button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>