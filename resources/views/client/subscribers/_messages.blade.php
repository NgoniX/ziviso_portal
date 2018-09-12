@php
    use App\Helpers\ClientHelper;
     $count=0;
 $client = ClientHelper::getInstance();
@endphp

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Date Sent</th>
        <th>Status</th>
    </tr>
    </thead>

    <tbody>
    @foreach($subscriber->messageReads as $messageRead)
        @if($client->hasMessage($messageRead->message->id))
        <tr>
            <td>{{++$count}}</td>
            <td>{{$messageRead->message->title}}</td>
            <td>{{$messageRead->created_at->format('M d, Y')}}</td>
            <td>{{$messageRead->readStatus}}</td>
        </tr>
        @endif
    @endforeach
    </tbody>

</table>