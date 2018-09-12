@php
    use App\Helpers\PrintHelper;
@endphp
<table class="table table-borderless">
    {{PrintHelper::reverse_static_info('Name', $subscriber->user->name)}}
    {{PrintHelper::reverse_static_info('Status', ucfirst($subscriber->user->status))}}
    {{PrintHelper::reverse_static_info('Groups', $subscriber->groups->count())}}
    {{PrintHelper::reverse_static_info('Messages', $subscriber->messageReads->count())}}
    {{PrintHelper::reverse_static_info('Profile', $subscriber->profile)}}
    {{PrintHelper::reverse_static_info('Created By', $subscriber->creator->name)}}
    {{PrintHelper::reverse_static_info('Date created', $subscriber->user->created_at->format('M d, Y'), 4)}}
    {{PrintHelper::reverse_static_info('Last Updated', $subscriber->user->updated_at->format('M d, Y'))}}
</table>