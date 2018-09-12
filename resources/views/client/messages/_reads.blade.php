@php
    $count=0;
@endphp

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Subscriber</th>
        <th>Status</th>
    </tr>
    </thead>

    <tbody>
    @foreach($message->messageReads as $read)
        <tr>
            <td>{{++$count}}</td>
            <td>{{$read->subscriber->user->name}}</td>
            <td>{{$read->readStatus}}</td>
        </tr>
    @endforeach
    </tbody>

</table>