<?php
use App\Helpers\PrintHelper;
?>

<table class="table table-borderless">
    {{PrintHelper::reverse_static_info('Full Name', $user->name)}}
    {{PrintHelper::reverse_static_info('Username', $user->username)}}
    {{PrintHelper::reverse_static_info('Status', ucfirst($user->status))}}
    {{PrintHelper::reverse_static_info('Subscribers', $user->client->subscribers->count())}}
    {{PrintHelper::reverse_static_info('Messages Sent', $user->client->messages->count())}}
    {{PrintHelper::reverse_static_info('Email', $user->email)}}
    {{PrintHelper::reverse_static_info('Phone', $user->phone)}}
    {{PrintHelper::reverse_static_info('Created By', $user->client->creator->name)}}
    {{PrintHelper::reverse_static_info('Date created', $user->created_at->format('M d, Y'))}}
    {{PrintHelper::reverse_static_info('Last Updated', $user->updated_at->format('M d, Y'))}}
    @if(!is_null($user->client->logo))
        <tr class="static-info">
            <td class="col-md-2 value" style="border: none !important;">
                Logo:
            </td>
            <td class="name" style="border: none !important;">
                <div class="profile-userpic">
                    <img src="{{ asset($user->client->logo) }}" alt="LOGO" class="logo-default"
                         style="width: 70px; height: 70px;"/>
                </div>
            </td>
        </tr>
    @endif
</table>