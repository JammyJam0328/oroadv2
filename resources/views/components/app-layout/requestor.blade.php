@props(['title'])

<div x-data="{ mbNav: false }"
    class="min-h-full">
    <nav class="sticky top-0 z-50 bg-dominant">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10"
                            src="{{ asset('images/sksu1.png') }}"
                            alt="Workflow">
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline ml-10 space-x-4">
                            <a href="{{ route('requestor.home') }}"
                                class="px-3 py-2 text-sm font-medium text-white rounded-md hover:bg-dominant hover:bg-opacity-75">
                                Home
                            </a>
                            <a href="{{ route('requestor.update-information') }}"
                                class="px-3 py-2 text-sm font-medium text-white rounded-md hover:bg-dominant hover:bg-opacity-75">
                                Update Information
                            </a>
                            <a href="#"
                                class="px-3 py-2 text-sm font-medium text-white rounded-md hover:bg-dominant hover:bg-opacity-75">
                                Help Desk
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div x-data="{ isOpen: false }"
                        class="">
                        <div x-show="mbNav==false"
                            class="flex">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-8 h-8 text-white"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </x-slot>
                                <a href="{{ route('profile.show') }}"
                                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-2">Account Setting</a>
                                <form method="POST"
                                    action="{{ route('logout') }}"
                                    x-data>
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        {{ __('Log out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-dropdown>
                        </div>
                    </div>
                    <div class="flex md:hidden">
                        <button x-on:click="mbNav=!mbNav"
                            type="button"
                            class="inline-flex items-center justify-center p-2 text-white rounded-md text-domibg-dominant bg-dominant hover:text-white hover:bg-dominant hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-domibg-dominant focus:ring-white"
                            aria-controls="mobile-menu"
                            aria-expanded="false">
                            <span class="sr-only">Open main menu</span>

                            <svg x-show="mbNav==false"
                                class="w-8 h-8 "
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-cloak
                                x-show="mbNav"
                                class="w-8 h-8"
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
                </div>
            </div>
        </div>

        <div x-cloak
            x-show="mbNav"
            x-collapse
            class="md:hidden"
            id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-dominant hover:bg-opacity-75">
                    Home
                </a>
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-dominant hover:bg-opacity-75">
                    Update Information
                </a>
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-dominant hover:bg-opacity-75">
                    Help Desk
                </a>
            </div>

        </div>
    </nav>
    <main>
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 py-4 sm:px-0">
                {{ $slot }}
            </div>
        </div>
    </main>
</div>
