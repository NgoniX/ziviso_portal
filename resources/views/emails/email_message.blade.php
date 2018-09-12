@component('mail::message')
# Dear {{$user->name}}

{{$message->details}}

Ziviso team,<br>
{{ config('app.name') }}
@endcomponent
