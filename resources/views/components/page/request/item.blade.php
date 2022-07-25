    <li>
        <a href="#"
            class="block ">
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-2 rounded-full bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-7 w-7 text-green-500"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                        <div>
                            <p class="text-sm font-medium text-indigo-600 truncate">{{ $request->request_code }}</p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                Document :
                                <span class="truncate">{{ $request->request_documents_count }}</span>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <div>
                                <p class="text-sm text-gray-900">
                                    Applied on
                                    <time datetime="2020-01-07">
                                        {{ $request->created_at->format('d M Y') }}
                                    </time>
                                </p>
                                <x-shared.request-status :status="$request->status" />
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="{ isOpen: false }"
                    x-on:click.away="isOpen = false"
                    class="relative">
                    <div>
                        <x-button.circle circle
                            x-on:click="isOpen=true">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-400"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </x-button.circle>
                    </div>
                    <div x-cloak
                        x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="flex space-x-2 absolute -right-1 -top-1 bg-white p-1">
                        <x-button.circle circle
                            x-on:click="location.href='{{ route('registrar.v2-request.view', ['id' => $request->id]) }}'">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </x-button.circle>
                        <x-button.circle circle>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </x-button.circle>
                        <x-button.circle circle>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </x-button.circle>
                        <x-button.circle circle
                            x-on:click="isOpen=false">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </x-button.circle>
                    </div>
                </div>
            </div>
        </a>
    </li>
