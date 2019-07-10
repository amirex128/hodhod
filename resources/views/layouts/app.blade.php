<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'فروشگاه هدهد') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- Argon CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/fSelect.css')}}">


        <style>
            /*
 *  STYLE 8
 */

            body::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
                border-radius: 10px;
            }

            body::-webkit-scrollbar
            {
                width: 10px;
                background-color: #F5F5F5;
            }

            body::-webkit-scrollbar-thumb
            {
                border-radius: 10px;
                background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(0.44, rgb(122,153,217)),
                color-stop(0.72, rgb(73,125,189)),
                color-stop(0.86, rgb(28,58,148)));
            }

            #sidenav-main::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
                border-radius: 10px;
            }

            #sidenav-main::-webkit-scrollbar
            {
                width: 10px;
                background-color: #F5F5F5;
            }

            #sidenav-main::-webkit-scrollbar-thumb
            {
                border-radius: 10px;
                background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(0.44, rgb(122,153,217)),
                color-stop(0.72, rgb(73,125,189)),
                color-stop(0.86, rgb(28,58,148)));
            }
        </style>
        @yield('style')
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

{{--        <script src="{{asset('js/vue.js')}}"></script>--}}
        @yield('script')

        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        @stack('js')
        <script src="{{asset('js/fSelect.js')}}"></script>

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script>

            $(document).ready(function () {
                $('.demo').fSelect();

            })
        </script>


    </body>
</html>
