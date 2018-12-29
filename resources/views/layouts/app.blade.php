<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="theme-color" content="#00baba" />
    <meta name="description" content="{{ $seo_description ?? config('app.description') }}">

    <title>{{ $seo_title ?? config('app.name') }} | {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" sizes="192x192" href="{{ asset('img/android-browser-icon.png') }}" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Lato:300"
    />
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    @yield('styles')

    {{-- Open Graph --}}
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
    @isset($meetup__next_event)
    <meta name="twitter:label1" value="Next Meetup" />
    <meta name="twitter:data1" value="📝 {{ $meetup__next_event['name'] }}" />
    <meta name="twitter:label2" value="Date" />
    <meta name="twitter:data2" value="🕐 {{ $meetup__next_event['starts_at']->format('F d, Y') }}" />
    @endisset

    {{-- @see https://developers.google.com/search/docs/data-types/events  --}}
    {{-- @see http://searchengineland.com/schema-markup-structured-data-seo-opportunities-site-type-231077 --}}

    {{-- Twitter widget --}}
    <script>window.twttr=function(t,e,r){var n,i=t.getElementsByTagName(e)[0],w=window.twttr||{};return t.getElementById(r)?w:((n=t.createElement(e)).id=r,n.src="https://platform.twitter.com/widgets.js",i.parentNode.insertBefore(n,i),w._e=[],w.ready=function(t){w._e.push(t)},w)}(document,"script","twitter-wjs");</script>
</head>
<body>
    @include('partials.gtm')

    <div id="app">
        @include($navigation ?? 'partials.nav')
        @yield('content')

        <speaker-call :opened="{{ isset($meetup__next_event) ? 'true' : 'false' }}"></speaker-call>

        @if (config('services.tinyletter.username'))
        <tinyletter-subscribe username="{{ config('services.tinyletter.username') }}"></tinyletter-subscribe>
        @endif

        @include('partials.footer')
        @include('partials.contact-modal')
    </div>

    <div id="snackbar"></div>

    <script type="text/javascript">window.lnConfig = {!! $lnConfig !!}</script>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
