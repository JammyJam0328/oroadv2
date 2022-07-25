<!DOCTYPE html>
<html class="h-full"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">
    <link rel="stylesheet"
        href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
    @livewireStyles
    @wireUiScripts
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

</head>

<body x-data="{ openNotificationPanel: false }"
    class="h-full text-gray-600 bg-white font-inter">

    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="relative z-40 md:hidden"
            role="dialog"
            aria-modal="true">
            <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

            <div class="fixed inset-0 z-40 flex">
                <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
                <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-white">
                    <!--
          Close button, show/hide based on off-canvas menu state.

          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
                    <div class="absolute top-0 right-0 pt-2 -mr-12">
                        <button type="button"
                            class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center flex-shrink-0 px-4">
                        <img class="w-auto h-8"
                            src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg"
                            alt="Workflow">
                    </div>
                    <div class="flex-1 h-0 mt-5 overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-100 hover:text-gray-900" -->
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                                <!--
                Heroicon name: outline/home

                Current: "text-gray-500", Default: "text-gray-400 "
              -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 "
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Team
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 "
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Projects
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                                <!-- Heroicon name: outline/calendar -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 "
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Calendar
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                                <!-- Heroicon name: outline/inbox -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 "
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                Documents
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                                <!-- Heroicon name: outline/chart-bar -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 "
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Reports
                            </a>
                        </nav>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white border-r border-gray-200 shadow">
                <div class="flex items-center justify-center flex-shrink-0">
                    <div class="flex items-center justify-start space-x-2 ">
                        <img src="{{ asset('images/nav-logo.png') }}"
                            class="shadow-sm h-14"
                            alt="logo">
                    </div>
                </div>
                <div class="flex items-center flex-shrink-0 px-4 mt-12">
                    <a href="#"
                        class="flex-shrink-0 block group">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block rounded-full h-9 w-9"
                                    src="{{ asset('images/sksu1.png') }}"
                                    alt="">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">
                                    Registrar
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="flex flex-col flex-grow mt-8">

                    <nav class="flex-1 px-2 pb-4 space-y-1">
                        <a href="{{ route('registrar.v2-dashboard') }}"
                            class="{{ Request::routeIs('registrar.v2-dashboard') ? 'bg-gradient-to-tr from-green-600 to-green-400 text-white' : ' text-gray-600  hover:bg-gray-100 hover:text-gray-900' }} flex items-center rounded-md px-2 py-2 text-sm font-medium  group">

                            <svg class="flex-shrink-0 w-6 h-6 mr-3 "
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('registrar.v2-requests') }}"
                            class="{{ Request::routeIs('registrar.v2-requests') || Request::routeIs('registrar.v2-request.view') ? 'bg-gradient-to-tr from-green-700 to-green-500 text-white' : ' text-gray-600  hover:bg-gray-100 hover:text-gray-900' }} flex items-center rounded-md px-2 py-2 text-sm font-medium  group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="flex-shrink-0 w-6 h-6 mr-3 "
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                            </svg>
                            Request
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md rounden-md hover:bg-gray-100 hover:text-gray-900 group">
                            <svg class="flex-shrink-0 w-6 h-6 mr-3 "
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Graphs
                        </a>


                        <a href="#"
                            class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md rounden-md hover:bg-gray-100 hover:text-gray-900 group">
                            <!-- Heroicon name: outline/inbox -->
                            <svg class="flex-shrink-0 w-6 h-6 mr-3 "
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            Documents
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md rounden-md hover:bg-gray-100 hover:text-gray-900 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="flex-shrink-0 w-6 h-6 mr-3 "
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Users
                        </a>

                        <a href="#"
                            class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 hover:text-gray-900 group">
                            <!-- Heroicon name: outline/chart-bar -->
                            <svg class="flex-shrink-0 w-6 h-6 mr-3 "
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Reports
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="md:pl-64">
            <div class="flex flex-col max-w-5xl mx-auto md:px-8 xl:px-0">
                <div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200">
                    <button type="button"
                        class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-2 -->
                        <svg class="w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                    <div class="flex justify-between flex-1 px-4 md:px-0">
                        <div id="back_button"
                            class="flex flex-1 items-center">

                        </div>
                        <div class="flex items-center ml-4 space-x-2 md:ml-6">
                            <button type="button"
                                x-on:click="openNotificationPanel=true"
                                class="p-1 text-gray-400 duration-150 ease-in-out bg-white border border-white rounded-full hover:border-gray-100 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-100">
                                <span class="sr-only">View notifications</span>
                                <svg class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <form method="POST"
                                action="{{ route('logout') }}"
                                class="p-1 text-gray-400 duration-150 ease-in-out bg-white border border-white rounded-full hover:border-gray-100 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-100"
                                x-data>
                                @csrf
                                <a href="{{ route('logout') }}"
                                    type="button"
                                    @click.prevent="$root.submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                </a>

                            </form>

                        </div>
                    </div>
                </div>

                <main class="flex-1">
                    @yield('main')
                </main>
            </div>
        </div>
        <div id="notification-panel">
            <div x-show="openNotificationPanel"
                x-cloak
                class="relative z-10"
                aria-labelledby="slide-over-title"
                role="dialog"
                aria-modal="true">

                <div x-show="openNotificationPanel"
                    x-transition:enter="ease-in-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-500"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">
                            <div x-show="openNotificationPanel"
                                x-transition:enter="ease-in-out duration-500"
                                x-transition:enter-start="opacity-0 translate-x-full"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="ease-in-out duration-500"
                                x-transition:leave-start="opacity-100 translate-x-0"
                                x-transition:leave-end="opacity-0 translate-x-full"
                                class="w-screen max-w-md pointer-events-auto">
                                <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl border-l-4 border-green-400"
                                    x-on:click.away="openNotificationPanel=false">
                                    <div class="px-4 sm:px-6">
                                        <div class="flex items-start justify-between">
                                            <h2 class="text-lg font-medium text-gray-900"
                                                id="slide-over-title">
                                                Notifications
                                            </h2>
                                            <div class="flex items-center ml-3 h-7">
                                                <button type="button"
                                                    x-on:click="openNotificationPanel=false"
                                                    class="text-gray-400 duration-150 ease-in-out bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-100 focus:ring-offset-2">
                                                    <span class="sr-only">Close panel</span>
                                                    <!-- Heroicon name: outline/x -->
                                                    <svg class="w-6 h-6"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex-1 mt-6 ">
                                        @livewire('components.registrar.notification-list')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-notifications z-index="z-50" />
        <x-dialog progressbar="true"
            z-index="z-50"
            blur="md"
            align="center" />
    </div>
    @livewireScripts

    <script>
        //  before user changes the page
        window.onbeforeunload = function() {
            NProgress.set(0.9);
        };
    </script>
</body>

</html>
