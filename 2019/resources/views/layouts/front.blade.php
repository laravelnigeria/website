<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#00baba" />
    <title>{{ ($page['title'] ?? config('app.name')) . ' | ' . config('app.name') }}</title>
    <meta name="description" content="Laravel Nigeria is the biggest Laravel PHP conference in Nigeria. It brings together the best PHP developers in Nigeria.">
    <meta property="og:title" content="Laravel Nigeria" />
    <meta property="og:site_name" content="Laravel Nigeria">
    <meta property="og:image" content="https://www.laravelnigeria.com/img/logo-icon.png">
    <meta property="og:description" content="Laravel Nigeria is the biggest Laravel PHP conference in Nigeria. It brings together the best PHP developers in Nigeria." />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@laravelnigeria">
    <meta name="twitter:creator" content="@neoighodaro">
    <meta name="twitter:title" content="Laravel Nigeria">
    <meta name="twitter:description" content="Laravel Nigeria is the biggest Laravel PHP conference in Nigeria. It brings together the best PHP developers in Nigeria.">
    <meta name="twitter:image" content="{{ asset('/img/android-browser-icon.png') }}">
    <link rel="icon" sizes="192x192" href="{{ asset('/img/android-browser-icon.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="//kit.fontawesome.com/01714cccb6.js" async></script>
    <script src="https://js.tito.io/v1"></script>
    @unless(app()->environment() == 'production')
    <script type="text/javascript">TitoDevelopmentMode = true</script>
    @endunless
    @include('partials.gtm')
</head>
<body>
    <div id="app">
        @include('partials.nav')
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}?v=1.0"></script>
    @if (session()->has('verified'))
    <script>swal('Verification successful', 'You have successfully confirmed your email address. See you at the conference.', 'success');</script>
    @endif
</body>
</html>
