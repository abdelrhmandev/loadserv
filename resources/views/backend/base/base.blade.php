<!DOCTYPE html>
<html direction="{{ config('project.app.dir') }}" dir="{{ config('project.app.dir') }}"
    style="direction: {{ config('project.app.dir') }}" lang="{{ app()->getLocale() }}">
<head>
    <title>{{ app('settings')['site_title'] }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{  app('settings')['site_description'] }}" />
    <meta name="keywords" content="{{ app('settings')['site_key_words'] }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ app('settings')['site_title'] }}" />
    <meta property="og:url" content="#" />
    <meta property="og:site_name" content= "{{ app('settings')['site_title'] }}" />
    <link rel="canonical" href="{{ config('project.app.url') }}" />
    <link rel="shortcut icon" href="{{ asset(app('settings')['site_favicon']) }}" />

<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
@yield('style')
<link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
                    @include('layouts.backend.aside._base')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('layouts.backend.header._base')
                    @include('layouts.backend.topbar._base')
                    @include('backend.partials.alerts.message')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                @include('layouts.backend._footer')
            </div>
        </div>
    </div>
    {{-- @include('layouts.backend.topbar._activity-drawer') --}}
    @include('layouts.backend._scrolltop')
    <script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('assets/backend/js/scripts.bundle.js')}}"></script>
    @stack('scripts')
</body>
</html>
