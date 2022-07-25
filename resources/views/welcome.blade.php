<!DOCTYPE html>
<html class="h-full bg-background"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">
    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body class="w-full h-full font-poppins bg-background">
    <nav class="bg-background ">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                </div>
                <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">

                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                </div>
            </div>
        </div>

    </nav>
    <div class="w-full h-full mx-auto max-w-7xl">
        <div class="flex justify-center">
            <img src="{{ asset('images/OREACADLogo1.png') }}"
                class="h-72"
                alt="...">
        </div>
        <div class="space-y-5">
            <h1 class="text-4xl font-bold text-center text-dominant">
                SULTAN KUDARAT STATE UNIVERSITY
            </h1>
            <h1 class="font-bold text-center text-oroad-secondary">
                Online Request of Academic Records
            </h1>
        </div>
        <div class="flex justify-center mt-5 space-x-3">
            @guest
                <x-button outline
                    green
                    href="{{ route('login') }}">
                    LOG IN
                </x-button>
                <x-button green
                    href="{{ route('register') }}">
                    REGISTER
                </x-button>
            @endguest
            @auth
                <x-button green
                    href="{{ route('dashboard') }}">
                    Dashboard
                </x-button>
            @endauth
        </div>
    </div>

</body>

</html>
