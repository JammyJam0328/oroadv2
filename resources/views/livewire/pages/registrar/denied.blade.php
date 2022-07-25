    <div x-data="{ openSearchPanel: false }"
        x-on:close-search-panel.window="openSearchPanel = false"
        x-on:keydown.escape="openSearchPanel=false"
        class="py-6"
        class="py-6">
        <div class="px-4 mx-auto text-gray-600 max-w-7xl sm:px-6 md:px-8">
            <x-card shadow="shadow-none"
                padding="px-2 py-2.5 md:px-4 ">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-8 h-8 text-red-400"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                        </svg>
                        <h1 class="text-xl font-semibold">
                            Denied
                        </h1>
                    </div>
                    <div class="flex items-center space-x-3">
                        <x-input wire:model.debounce.500ms="search_request_code"
                            placeholder="Search Request Code" />
                        <x-button wire:click="$refresh">
                            <svg wire:loading.class="animate-spin fill-green-600"
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 fill-gray-500"
                                viewBox="0 0 24 24">
                                <path fill="none"
                                    d="M0 0h24v24H0z" />
                                <path
                                    d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
                            </svg>
                        </x-button>
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                        </x-button>
                        @livewire('components.search-request')
                    </div>
                </div>
            </x-card>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <div class="py-4">
                <x-card shadow="shadow-none">
                    @include('reg-component.denied.denied-table')
                </x-card>
            </div>
        </div>
    </div>
