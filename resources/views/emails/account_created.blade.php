@component('mail::message')
# New Account Created

Dear {{$user->name}}.

Please note that your Ziviso account has been successfully created.


@component('mail::panel')
    **Your credentials are:**

    Username: {{$user->username}}
    Password: {{$password}}

@endcomponent

Welcome to the Ziviso family. We hope you will enjoy the experience.

@component('mail::button', ['url' => url('login'), 'color' => 'blue'])
Sign In
@endcomponent

Ziviso team,<br>
{{ config('app.name') }}
@endcomponent