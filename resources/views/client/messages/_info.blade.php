@php
    use App\Helpers\PrintHelper;
@endphp
<table class="table table-borderless">
    {{PrintHelper::reverse_static_info('Title', $message->title)}}
    {{PrintHelper::reverse_static_info('Groups', $message->groups->count())}}
    {{PrintHelper::reverse_static_info('Subscribers', $message->messageReads->count())}}
    {{PrintHelper::reverse_static_info('Reads', $message->messageReads()->where('status', '1')->count())}}
    {{PrintHelper::reverse_static_info('Unreads', $message->messageReads()->where('status', '0')->count())}}
    {{PrintHelper::reverse_static_info('Created By', $message->user->name)}}
    {{PrintHelper::reverse_static_info('Date created', $message->created_at->format('M d, Y'), 4)}}
    {{PrintHelper::reverse_static_info('Message Body', $message->details)}}
</table>