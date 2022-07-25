<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/OREACADLogo1.png') }}"
                class="h-32"
                alt="">
        </x-slot>
        <div class="mb-3">
            <h1 class="text-xl text-center text-gray-700">CREATE AN ACCOUNT</h1>
            <x-errors />
        </div>
        {{-- <x-jet-validation-errors class="mb-4" /> --}}



        <form method="POST"
            action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name"
                    value="{{ __('Name') }}" />
                <x-jet-input id="name"
                    class="block w-full mt-1"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email"
                    value="{{ __('Email') }}" />
                <x-jet-input id="email"
                    class="block w-full mt-1"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password"
                    value="{{ __('Password') }}" />
                <x-jet-input id="password"
                    class="block w-full mt-1"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation"
                    value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation"
                    class="block w-full mt-1"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline focus:outline-none hover:text-gray-900"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4 bg-dominant">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

        </form>
        <div class="grid mt-3 space-y-3">
            <div class="relative">
                <div class="absolute inset-0 flex items-center"
                    aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-2 text-sm text-gray-500 bg-white"> or register with </span>
                </div>
            </div>
            <button type="button"
                class="flex items-center justify-center px-4 py-2 space-x-2 font-medium text-center text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="w-6 h-6 fill-white">
                    <path fill="none"
                        d="M0 0h24v24H0z" />
                    <path
                        d="M3.064 7.51A9.996 9.996 0 0 1 12 2c2.695 0 4.959.99 6.69 2.605l-2.867 2.868C14.786 6.482 13.468 5.977 12 5.977c-2.605 0-4.81 1.76-5.595 4.123-.2.6-.314 1.24-.314 1.9 0 .66.114 1.3.314 1.9.786 2.364 2.99 4.123 5.595 4.123 1.345 0 2.49-.355 3.386-.955a4.6 4.6 0 0 0 1.996-3.018H12v-3.868h9.418c.118.654.182 1.336.182 2.045 0 3.046-1.09 5.61-2.982 7.35C16.964 21.105 14.7 22 12 22A9.996 9.996 0 0 1 2 12c0-1.614.386-3.14 1.064-4.49z" />
                </svg>
                <span>Google</span>
            </button>
            <button type="button"
                class="flex items-center justify-center px-4 py-2 space-x-2 font-medium text-center text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="w-6 h-6 fill-white">
                    <path fill="none"
                        d="M0 0h24v24H0z" />
                    <path
                        d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z" />
                </svg>
                <span>Facebook</span>
            </button>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
