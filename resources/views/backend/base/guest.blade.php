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
    @yield('style')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
    <script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/scripts.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>
