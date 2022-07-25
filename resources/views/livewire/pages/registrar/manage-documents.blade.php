    <div class="py-6">
        <div class="px-4 mx-auto text-gray-600 max-w-7xl sm:px-6 md:px-8">
            <x-card shadow="shadow-none"
                padding="px-2 py-2.5 md:px-4 ">
                <div class="flex items-center justify-between space-x-3">
                    <div class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-8 h-8 text-indigo-600"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                        </svg>
                        <h1 class="text-xl font-semibold">
                            Manage Documents
                        </h1>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <div class="py-4">
                @include('reg-component.document.document-table')
            </div>
            <div>
                {{ $documents->links() }}
            </div>
        </div>
    </div>
