@php
    $count=0;
@endphp

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Group Name</th>
        <th>Active Subscribers</th>
        <th>Date Added</th>
    </tr>
    </thead>

    <tbody>
    @foreach($message->groups as $group)
        <tr>
            <td>{{++$count}}</td>
            <td>{{$group->name}}</td>
            <td>{{$group->subscribers->count()}}</td>
            <td>{{$group->pivot->created_at->format('M d, Y')}}</td>
        </tr>
    @endforeach
    </tbody>

</table>