{{-- <div>
    <div x-data="{ optionModal: false, setId: '' }">
        <div class="flex items-center justify-between px-3 py-3 space-x-2 bg-gray-100 border rounded-md">
            <div class="flex space-x-3">
                <div>
                    <input type="text"
                        name="search"
                        id="search"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Search">
                </div>
                <div>
                    <select id="filter"
                        wire:model="filter"
                        name="filter"
                        class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value=""
                            selected>All</option>
                        <option value="finalized">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="payment-to-review">Payment To Review</option>
                        <option value="ready-to-claim">Ready To Claim</option>
                        <option value="claimed">Claimed</option>
                        <option value="denied">Denied</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-3">
                <x-button white>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        class="w-6 h-6 fill-gray-500">
                        <path fill="none"
                            d="M0 0h24v24H0z" />
                        <path
                            d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
                    </svg>
                </x-button>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border shadow md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-700 sm:pl-6">
                                        Request Code
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
                                        Purpose
                                    </th>
                                    <th scope="col"
                                        class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($requests as $key=>$request)
                                    <tr wire:key="{{ $key }}-request">
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-green-600 whitespace-nowrap sm:pl-6">
                                            {{ $request->request_code }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $request->user->information->first_name }}
                                            {{ $request->user->information->middle_name }}
                                            {{ $request->user->information->last_name }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            @switch($request->status)
                                                @case('finalized')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        Pending
                                                    </span>
                                                @break

                                                @case('approved')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                        Approved
                                                    </span>
                                                @break

                                                @case('payment-to-review')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                        Payment To Review
                                                    </span>
                                                @break

                                                @case('ready-to-claim')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        Ready To Claim
                                                    </span>
                                                @break

                                                @case('claimed')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                        Claimed
                                                    </span>
                                                @break

                                                @case('denied')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        Denied
                                                    </span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $request->purpose }}
                                            {{ $request->other_purpose ? '(' . $request->other_purpose . ')' : '' }}
                                        </td>
                                        <td x-id="['action-controls']"
                                            class="relative py-2 pr-4 text-sm font-medium text-right whitespace-nowrap ">
                                            <x-button.circle icon="dots-horizontal"
                                                x-bind:id="$id('action-controls')"
                                                x-on:click="optionModal=true ; setId = '{{ $request->id }}';"
                                                flat />
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"
                                                class="px-4 py-4 text-center text-gray-500">
                                                No requests found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            {{ $requests->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div id="option-modal">
                <div x-show="optionModal"
                    x-cloak
                    x-on:keydown.escape.window="optionModal = false"
                    class="relative z-10"
                    aria-labelledby="modal-title"
                    role="dialog"
                    aria-modal="true">
                    <div x-cloak
                        x-show="optionModal"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

                    <div class="fixed inset-0 z-10 overflow-y-auto">
                        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">

                            <div x-show="optionModal"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-on:click.away="optionModal = false"
                                class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-sm sm:w-full sm:p-6">
                                <div class="grid space-y-2">
                                    <x-button label="View"
                                        x-on:click="$wire.view(setId)"
                                        green />
                                    <hr>
                                    <x-button label="Cancel"
                                        x-on:click="optionModal=false" />
                                    <x-button label="Edit" />
                                    <x-button label="Delete" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<div>
    <div class="mb-5">
        <div class="flex justify-between ">
            <div class="flex space-x-2 items-center">
                <input type="text"
                    wire:model.debounce.500ms="search"
                    class="bg-gray-50 rounded-lg border border-gray-200 ring-0 focus:outline-none focus:ring-0 focus:border-gray-200 p-2"
                    placeholder="Search"
                    name="search"
                    id="search">
            </div>
            <div class="flex space-x-2">
                <div id="loading-indicator "
                    class="flex items-center mr-5">
                    <div wire:loading.delay.longest>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            class="h-7 w-7 fill-gray-400 animate-spin">
                            <path fill="none"
                                d="M0 0h24v24H0z" />
                            <path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z" />
                        </svg>
                    </div>
                </div>
                <select id="status"
                    wire:model="request_status"
                    name="status"
                    class="bg-gray-50 rounded-lg border border-gray-200 ring-0 focus:outline-none focus:ring-0 focus:border-gray-200 p-2">
                    <option value="">All</option>
                    <option value="finalized">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="payment-to-review">Payment To Review</option>
                    <option value="ready-to-claim">Ready To Claim</option>
                    <option value="claimed">Claimed</option>
                    <option value="denied">Denied</option>
                </select>
                <select id="request_from"
                    wire:model="request_from"
                    name="location"
                    class="bg-gray-50 rounded-lg border border-gray-200 ring-0 focus:outline-none focus:ring-0 focus:border-gray-200 p-2">
                    <option value="">All</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="graduated">Graduated</option>
                    <option value="not-graduated">Not-Graduated</option>
                </select>
            </div>
        </div>
    </div>
    <div class="bg-white border overflow-hidden sm:rounded-md">
        <ul role="list"
            class="divide-y divide-gray-200">
            @forelse ($requests as $request)
                <x-page.request.item :request="$request" />
            @empty
                <li class="px-4 py-4 text-center text-gray-500">
                    No requests found.
                </li>
            @endforelse
        </ul>
    </div>
</div>
