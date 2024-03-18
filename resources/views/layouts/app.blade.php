<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <Meta Content=@yield('content-description') Name='Description'/>
        <Meta Content=@yield('content-keyword') Name='Keywords'/>
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme-style.css?v=1.0') }}">
        @yield('css')
      </head>
    <body>
        {{-- header::start --}}
        @include('layouts.header')
        {{-- header::end --}}
        {{-- main::start --}}
        @yield('main')
        {{-- main::end --}}
        @include('layouts.footer')
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>
        <script src="{{ asset('assets/js/theme.min.js') }}"></script>
        @yield('js')
    </body>
</html>
