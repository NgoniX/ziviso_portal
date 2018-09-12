@php
    use App\Helpers\PrintHelper;
@endphp
<table class="table table-borderless">
    {{PrintHelper::reverse_static_info('Name', $group->name)}}
    {{PrintHelper::reverse_static_info('Join Criteria', ucfirst($group->join_criteria))}}
    {{PrintHelper::reverse_static_info('Description', $group->description)}}
    {{PrintHelper::reverse_static_info('Subscribers', $group->subscribers->count())}}
    {{PrintHelper::reverse_static_info('Messages', $group->messages->count())}}
    {{PrintHelper::reverse_static_info('Created By', $group->creator->name)}}
    {{PrintHelper::reverse_static_info('Date created', $group->created_at->format('M d, Y'), 4)}}
    {{PrintHelper::reverse_static_info('Last Updated', $group->updated_at->format('M d, Y'))}}
</table>