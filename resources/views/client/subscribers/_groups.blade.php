@php
use App\Helpers\ClientHelper;
    $count=0;
$client = ClientHelper::getInstance();
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
    @foreach($subscriber->groups as $group)
        @if($client->clientOwnsGroup($group->id))
        <tr>
            <td>{{++$count}}</td>
            <td>{{$group->name}}</td>
            <td>{{$group->subscribers->count()}}</td>
            <td>{{$group->pivot->created_at->format('M d, Y')}}</td>
        </tr>
        @endif
    @endforeach
    </tbody>

</table>