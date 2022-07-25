<div x-data>
    <x-button x-on:click="openSearchPanel=true"
        x-on:keyup.escape.window="openSearchPanel=false">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </x-button>
    <div id="search-panel">
        <div x-cloak
            x-show="openSearchPanel"
            class="fixed inset-0 z-10 p-4 overflow-y-auto sm:p-6 md:p-20"
            role="dialog"
            aria-modal="true">
            <div x-show="openSearchPanel"
                x-on:click="openSearchPanel=false"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-25"
                aria-hidden="true"></div>

            <div x-show="openSearchPanel"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="max-w-xl mx-auto overflow-hidden transition-all transform bg-white divide-y divide-gray-100 shadow-2xl rounded-xl ring-1 ring-black ring-opacity-5">
                <div class="relative">
                    <svg wire:loading.remove
                        wire:target="searchTerm"
                        id="123-search-icon"
                        class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <svg wire:loading
                        wire:target="searchTerm"
                        id="loading-icon"
                        class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400 animate-spin"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 16">
                        <path fill="#444"
                            d="M12.9 3.1C14.2 4.3 15 6.1 15 8c0 3.9-3.1 7-7 7s-7-3.1-7-7c0-1.9.8-3.7 2.1-4.9l-.8-.8C.9 3.8 0 5.8 0 8c0 4.4 3.6 8 8 8s8-3.6 8-8c0-2.2-.9-4.2-2.3-5.7l-.8.8z" />
                    </svg>
                    <input type="text"
                        wire:model.debounce.500ms="searchTerm"
                        class="w-full h-12 pr-4 text-gray-800 placeholder-gray-400 bg-transparent border-0 pl-11 focus:ring-0 sm:text-sm"
                        placeholder="Search..."
                        role="combobox"
                        aria-expanded="false"
                        aria-controls="options">
                </div>
                <ul class="py-2 overflow-y-auto text-sm text-gray-800 max-h-72 scroll-py-2"
                    id="options"
                    role="listbox">
                    @forelse ($searchResults as $key=>$searchResult)
                        <li wire:key="{{ $key }}-search-result"
                            wire:click="setNewRequestCollection({{ $searchResult->id }})"
                            class="px-4 py-2 cursor-default select-none"
                            id="option-1"
                            role="option"
                            tabindex="-1">
                            {{ $searchResult->student_id }} - {{ $searchResult->first_name }}
                            {{ $searchResult->middle_name }} {{ $searchResult->last_name }}

                        </li>
                    @empty
                        <div>
                            <p class="p-4 text-sm text-gray-500">
                                {{ $this->searchTerm != '' ? 'No results found' : 'Start typing to search' }}
                            </p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
