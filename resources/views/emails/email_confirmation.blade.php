@component('mail::message')
# Email Confirmation

Good day {{$user->name}}.

You have created a subscriber account on Ziviso on {{$user->created_at->format('M d, Y')}} at {{$user->created_at->format('h:m:s a')}}

Confirm your account by clicking the button below.

@component('mail::button', ['url' => url('confirm-email/'.$user->email_verification_token)])
Confirm Email
@endcomponent

Ziviso team,<br>
{{ config('app.name') }}
@endcomponent
