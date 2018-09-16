<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Design System - Free Design System for Bootstrap 4</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/argon.js') }}" defer></script>

    <!-- Favicon -->
    <link href="{{ asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('staticvendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{ asset('staticvendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
{{--<!-- Argon CSS -->--}}
{{--<link type="text/css" href="{{ asset('  /css/argon.css?v=1.0.1" rel="stylesheet">--}}
<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{ asset('css/docs.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    @include('shared.header')
    @yield('content')
    @include('shared.footer')

</div>
<!-- Core -->
<script src="{{ asset('staticvendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('staticvendor/popper/popper.min.js')}}"></script>
<script src="{{ asset('staticvendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ asset('staticvendor/headroom/headroom.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{ asset('js/argon.js?v=1.0.1')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
</body>

</html>
