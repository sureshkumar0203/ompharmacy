<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ ENV('APP_ENV') }} | @yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/images/favicon.ico') }}">
        <!-- Bootstrap -->
        <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('public/admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('public/admin/css/nprogress.css') }}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ asset('public/admin/css/animate.min.css') }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset('public/admin/css/custom.min.css') }}" rel="stylesheet">
    </head>
    <body class="login">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('public/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/parsley.min.js') }}"></script>
</html>