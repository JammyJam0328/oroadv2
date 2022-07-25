<!DOCTYPE html>
<html class="bg-gray-100"
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

    @livewireStyles
    @wireUiScripts
    <link rel="stylesheet"
        href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
</head>

<body class="bg-gray-100 font-poppins">
    <div>
        <div>
            <div class="fixed inset-0 z-40 flex md:hidden"
                role="dialog"
                aria-modal="true">
                <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75"
                    aria-hidden="true"></div>

                <!--
      Off-canvas menu, show/hide based on off-canvas menu state.

      Entering: "transition ease-in-out duration-300 transform"
        From: "-translate-x-full"
        To: "translate-x-0"
      Leaving: "transition ease-in-out duration-300 transform"
        From: "translate-x-0"
        To: "-translate-x-full"
    -->
                <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-dominant">
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
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center flex-shrink-0 px-4">
                        <img class="w-auto h-8"
                            src="{{ asset('images/sksu1.png') }}"
                            alt="Workflow">
                    </div>
                    <div class="flex-1 h-0 mt-5 overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <!-- Current: "bg-dominant text-white", Default: "text-dombg-dominant hover:bg-dominant" -->
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md bg-dominant group">
                                <!-- Heroicon name: outline/home -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-dombg-dominant"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-dombg-dominant hover:bg-dominant group">
                                <!-- Heroicon name: outline/users -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-dombg-dominant"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Team
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-dombg-dominant hover:bg-dominant group">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-dombg-dominant"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Projects
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-dombg-dominant hover:bg-dominant group">
                                <!-- Heroicon name: outline/calendar -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-dombg-dominant"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Calendar
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-dombg-dominant hover:bg-dominant group">
                                <!-- Heroicon name: outline/inbox -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-dombg-dominant"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                Documents
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-dombg-dominant hover:bg-dominant group">
                                <!-- Heroicon name: outline/chart-bar -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-dombg-dominant"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Reports
                            </a>
                        </nav>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14"
                    aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>

            <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-dominant">
                    <div class="flex items-center flex-shrink-0 px-2 ">
                        <div class="flex items-center w-full p-2 space-x-2 bg-green-700 rounded-md">
                            <img class="w-auto h-12"
                                src="{{ asset('images/sksu1.png') }}"
                                alt="Workflow">
                            <h1 class="text-xl font-semibold text-white">
                                SKSU-OROAD
                            </h1>
                        </div>

                    </div>
                    <div class="flex flex-col flex-1 mt-5">
                        @php
                            $icon_class = 'flex-shrink-0 w-6 h-6 mr-3 text-white';
                        @endphp
                        <nav class="flex-1 px-2 pb-4 space-y-1">
                            <x-reg.link active="{{ Request::routeIs('registrar.dashboard') }}"
                                to="{{ route('registrar.dashboard') }}"
                                label="Dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </x-reg.link>
                            <x-reg.link active="{{ Request::routeIs('registrar.graphs') }}"
                                to="{{ route('registrar.graphs') }}"
                                label="Graphs">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                            </x-reg.link>

                            <hr>
                            <div class="pl-2">
                                <h1 class="text-sm text-green-200">Request</h1>
                            </div>
                            <x-reg.link active="{{ Request::routeIs('registrar.pending-request') }}"
                                to="{{ route('registrar.pending-request') }}"
                                label="Pending">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </x-reg.link>
                            <x-reg.link active="{{ Request::routeIs('registrar.approved-request') }}"
                                to="{{ route('registrar.approved-request') }}"
                                label="Approved">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-reg.link>
                            <x-reg.link active="{{ Request::routeIs('registrar.payment-to-review') }}"
                                to="{{ route('registrar.payment-to-review') }}"
                                label="Payment To Review">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-reg.link>
                            <x-reg.link active="{{ Request::routeIs('registrar.to-claim') }}"
                                to="{{ route('registrar.to-claim') }}"
                                label="To Claim">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                        clip-rule="evenodd" />
                                </svg>

                            </x-reg.link>
                            <x-reg.link active="{{ Request::routeIs('registrar.claimed') }}"
                                to="{{ route('registrar.claimed') }}"
                                label="Claimed">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-reg.link>
                            <x-reg.link active="{{ Request::routeIs('registrar.denied') }}"
                                to="{{ route('registrar.denied') }}"
                                label="Denied">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                                </svg>
                            </x-reg.link>

                            <hr>

                            <x-reg.link active="{{ Request::routeIs('registrar.reports') }}"
                                to="{{ route('registrar.reports') }}"
                                label="Reports">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="{{ $icon_class }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-reg.link>

                            @if (auth()->user()->campus_id == '1')
                                <x-reg.link active="{{ Request::routeIs('registrar.manage.campus.documents') }}"
                                    to="{{ route('registrar.manage.campus.documents') }}"
                                    label="Documents">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="{{ $icon_class }}"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                        <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                    </svg>
                                </x-reg.link>
                                <x-reg.link active="{{ Request::routeIs('registrar.manage-users') }}"
                                    to="{{ route('registrar.manage-users') }}"
                                    label="Manage User">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="{{ $icon_class }}"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                    </svg>
                                </x-reg.link>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
            <div class="flex flex-col flex-1 md:pl-64">
                <div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white shadow">
                    <button type="button"
                        class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-dombg-dominant md:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-2 -->
                        <svg class="w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                    <div class="flex justify-between flex-1 px-4">
                        <div id="nav-button"
                            class="flex items-center">
                            @include('reg-component.view-request.return-button')
                        </div>
                        <div wire:key="upper-nav"
                            id="upper-nav"
                            class="flex items-center ml-4 md:ml-6">
                            @livewire('components.registrar-nav-notification-icon')
                            <div x-data="{ isOpen: false }"
                                class="relative ml-3">
                                <div>
                                    <button x-on:click="isOpen=!isOpen"
                                        type="button"
                                        class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dombg-dominant"
                                        id="user-menu-button"
                                        aria-expanded="false"
                                        aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 text-gray-400"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div x-cloak
                                    x-show="isOpen"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    x-on:click.away="isOpen=false"
                                    class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <form method="POST"
                                        action="{{ route('logout') }}"
                                        x-data>
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50"
        blur="md"
        align="center" />
    @livewireScripts
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.hook('message.sent', () => {
                NProgress.set(0.4);
            })
            this.livewire.hook('message.processed', () => {
                NProgress.done()
            })
            this.livewire.hook('message.failed', () => {
                NProgress.remove()
            })
        })
    </script>
</body>

</html>
