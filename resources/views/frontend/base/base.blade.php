<!DOCTYPE html>
<html direction="{{ config('project.app.dir') }}" dir="{{ config('project.app.dir') }}"
    style="direction: {{ config('project.app.dir') }}" lang="{{ app()->getLocale() }}">

<head>
    <title>{{ config('project.app.title', 'Laravel') }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('project.app.description') }}" />
    <meta name="keywords" content="{{ config('project.app.key_words') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('project.app.title') }}" />
    <meta property="og:url" content="#" />
    <meta property="og:site_name" content= "{{ config('project.app.title') }}" />
    <link rel="canonical" href="{{ config('project.app.url') }}" />
    <link rel="shortcut icon" href="{{ asset(config('project.app.favicon')) }}" />

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/frontend/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>

    @include('layouts.frontend.topbar._base')
    @include('layouts.frontend.header._base')
    @yield('content')
    @include('layouts.frontend._footer')
    @include('layouts.frontend._scrolltop')
    <script src="{{ asset('assets/frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
