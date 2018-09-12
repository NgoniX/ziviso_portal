@php
$count=0;
@endphp

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($user->client->subscribers as $subscriber)
        <tr>
            <td>{{++$count}}</td>
            <td>{{$subscriber->user->name}}</td>
            <td>{{$subscriber->user->email}}</td>
            <td>{{$subscriber->user->phone}}</td>
            <td>{{ucfirst($subscriber->user->status)}}</td>
        </tr>
         @endforeach
    </tbody>

</table>