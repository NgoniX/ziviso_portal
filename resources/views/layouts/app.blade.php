<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .login-headings{
            font-weight: bold;
            font-size: x-large;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="app" style="margin-top: 10%">

        <div style="width: 60%; margin: auto; text-align: center;">
            @include('flash::message')
        </div>

        @yield('content')


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            $('div.alert').delay(5000).slideUp(300);
        });
    </script>
</body>
</html>
