<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Page-specific meta (optional) --}}
    @yield('meta')

    <title>
        @hasSection('title')
        @yield('title') | {{ config('app.name') }}
        @else
        {{ config('app.name') }}
        @endif
    </title>

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts (Client request) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Warp&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">


    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>


<body class="index-page">
    @include('includes.frontend.header')

    <main>
        @yield('content')
    </main>

    @include('partials.chatbot-widget')
    <script src="{{ asset('assets/js/chatbot.js') }}"></script>

    @include('includes.frontend.footer')

    @once
        @include('partials.translate-scripts')
    @endonce

</body>
</html>
