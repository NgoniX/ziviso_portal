@component('mail::message')
# Dear {{$joinRequest->subscriber->user->name}}

Please note that you request to join {{$joinRequest->group->name}} which belongs to {{$joinRequest->group->client->user->name}} has been **{{ucfirst($actionTaken)}}**

Ziviso team,<br>
{{ config('app.name') }}
@endcomponent
