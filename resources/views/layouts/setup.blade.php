<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ asset('images/sksu1.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card"
        content="{{ asset('images/OREACADLogo1.png') }}" />
    <meta property="og:type"
        content="website">
    <meta property="og:title"
        content="SKSU OROAD" />
    <meta name="description"
        content="Sultan Kudarat State Universiry Online Request of Academic Record">
    <meta property="og:description"
        content="Sultan Kudarat State Universiry Online Request of Academic Record">
    <meta property="og:image"
        content="{{ asset('images/sksu1.png') }}" />
    <meta property="og:url"
        content="{{ env('APP_URL') }}" />
    <meta property="og:locale"
        content="en" />
    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">
    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body class=" font-poppins bg-background">

    {{ $slot }}
    @livewireScripts
</body>

</html>
