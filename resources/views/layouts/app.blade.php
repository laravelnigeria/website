<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seo_title ?? config('app.name') }} | {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" sizes="192x192" href="{{ asset('img/android-browser-icon.png') }}">
    <meta name="theme-color" content="#00baba">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Lato:300">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <meta name="description" content="{{ $seo_description ?? config('app.description') }}">

    {{-- SEO --}}
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ $seo_title ?? config('app.name') }}">
    <meta property="og:image" content="{{ $seo_image ?? asset('img/logo-icon.png') }}">
    <meta property="og:description" content="{{ $seo_description ?? config('app.description') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@laravelnigeria">
    <meta name="twitter:creator" content="@neoighodaro">
    <meta name="twitter:title" content="{{ $seo_title ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo_description ?? config('app.description') }}">
    <meta name="twitter:image" content="{{ $seo_image ?? asset('img/android-browser-icon.png') }}">

    @if ($meetup__next_event)
    <meta name="twitter:label1" value="Next Meetup" />
    <meta name="twitter:data1" value="📝 {{ $meetup__next_event['name'] }}" />
    <meta name="twitter:label2" value="Date" />
    <meta name="twitter:data2" value="🕐 {{ $meetup__next_event['time_object']->format('F d, Y') }}" />
    @endif

    {{-- http://searchengineland.com/schema-markup-structured-data-seo-opportunities-site-type-231077 --}}
    {{-- https://developers.google.com/search/docs/data-types/events --}}
    @include('partials.early-scripts')
    @yield('styles')
</head>
<body>
    @if (config('services.google_tag_manager_id'))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.google_tag_manager_id') }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer', "{{ config('services.google_tag_manager.id') }}");</script>
    @endif

    {{-- @TODO: Make this optional --}}
    {{-- <script src="//load.sumome.com/" data-sumo-site-id="755c93d9c7c81e64a8390a6b157487081e20e828b7a704939c0b13414140783e" async="async"></script> --}}

    <div id="app">
        @include($navigation ?? 'partials.nav')
        @yield('content')
        @include('partials.footer')
    </div>

    <div id="snackbar">This is the default message.</div>

    @include('partials.popups')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
