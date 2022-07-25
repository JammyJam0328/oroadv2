{{-- <div>
    <section aria-labelledby="summary-heading"
        class="flex-col w-full ">
        <div class="px-4 mt-4">
            <h2 id="document-lists"
                class="text-lg font-medium text-gray-900">
                Document(s)
            </h2>
        </div>
        <ul role="list"
            class="flex-auto px-4 overflow-y-auto divide-y divide-gray-200">
            @foreach ($request_documents as $request_document)
                <li class="flex py-6 space-x-6">
                    <div class="flex flex-col justify-between space-y-4">
                        <div class="space-y-1 text-sm font-medium">
                            <h3 class="text-gray-900">
                                {{ $request_document->campusDocument->document->name }}
                            </h3>
                            <p id="price"
                                class="text-gray-900">
                                &#8369; {{ $request_document->campusDocument->document->price }}
                            </p>
                            <p id="description"
                                class="text-gray-500">
                                {{ $request_document->campusDocument->document->other_description }}
                            </p>
                            <p id="authentication"
                                class="text-gray-500">
                                {{ $request_document->copy }} copy (s) |
                                {{ $request_document->withAuth ? 'With Authentication' : 'Without Authentication' }}
                            </p>
                            @if ($request_document->campusDocument->document->id == '5')
                                <div x-data="{ page: {{ $request_document->number_of_pages }} }"
                                    id="page"
                                    class="flex items-center space-x-2">
                                    <h1 class="text-gray-500"> Page :</h1>
                                    @if ($request_status == 'finalized')
                                        <x-native-select x-model="page"
                                            x-on:change="$wire.setPage(page,{{ $request_document->id }})">
                                            @for ($i = 0; $i < 50; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </x-native-select>
                                    @else
                                        <h1>
                                            {{ $request_document->number_of_pages }}
                                        </h1>
                                    @endif
                                </div>
                            @endif
                        </div>
                        @if ($request_status == 'finalized' && $request_document->campusDocument->document->id != '5')
                            <div id="notTOR-action-buttons">
                                @if ($request_document->docx_status == 'pending')
                                    <div id="pending-action"
                                        class="flex space-x-2">
                                        <x-button type="button"
                                            wire:click="approveDocument({{ $request_document->id }})"
                                            flat
                                            info>Approve</x-button>
                                        <div class="flex pl-4 border-l border-gray-300">
                                            <x-button type="button"
                                                wire:click="denyDocument({{ $request_document->id }})"
                                                flat
                                                negative>Deny</x-button>
                                        </div>
                                    </div>
                                @elseif ($request_document->docx_status == 'approved' || $request_document->docx_status == 'denied')
                                    <x-button type="button"
                                        wire:click="undoAction({{ $request_document->id }})"
                                        flat
                                        gray>Undo</x-button>
                                @endif
                            </div>
                        @elseif ($request_status == 'finalized' && $request_document->campusDocument->document->id == '5')
                            <div id="tor-action-buttons">
                                @if ($request_document->docx_status == 'pending')
                                    <div id="pending-action"
                                        class="flex space-x-2">
                                        <x-button type="button"
                                            wire:click="approveTOR({{ $request_document->id }})"
                                            flat
                                            info>Approve</x-button>
                                        <div class="flex pl-4 border-l border-gray-300">
                                            <x-button type="button"
                                                wire:click="denyTOR({{ $request_document->id }})"
                                                flat
                                                negative>Deny</x-button>
                                        </div>
                                    </div>
                                @elseif ($request_document->docx_status == 'approved' || $request_document->docx_status == 'denied')
                                    <x-button type="button"
                                        wire:click="undoAction({{ $request_document->id }})"
                                        flat
                                        gray>Undo</x-button>
                                @endif
                            </div>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</div> --}}

<main class="max-w-2xl pt-5 pb-5 mx-auto lg:max-w-7xl ">
    <form class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
        <section aria-labelledby="cart-heading"
            class="lg:col-span-7">
            <h2 id="cart-heading"
                class="sr-only">Items in your shopping cart</h2>
            <ul role="list"
                class="border-b border-gray-200 divide-y divide-gray-200">
                @foreach ($request_documents as $request_document)
                    <li class="flex py-2">
                        <div class="flex flex-col justify-between flex-1 ml-4 sm:ml-6">
                            <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                <div>
                                    <div class="flex justify-between">
                                        <h3 class="text-sm">
                                            <a href="#"
                                                class="font-medium text-gray-700 hover:text-gray-800">
                                                {{ $request_document->campusDocument->document->name }}
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="flex mt-1 text-sm">
                                        <p class="text-gray-500"> {{ $request_document->copy }} copy(s)</p>
                                        <p class="pl-4 ml-4 text-gray-500 border-l border-gray-200">
                                            {{ $request_document->withAuth ? 'With Authentication' : 'Without Authentication' }}
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm font-medium text-gray-900">
                                        &#8369; {{ $request_document->campusDocument->document->price }}
                                    </p>
                                    <p class="mt-1 text-sm font-medium text-gray-900">
                                        {{ $request_document->campusDocument->document->description }}
                                    </p>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:pr-9">
                                    @if ($allowed_to_approved && $request_status == 'finalized')
                                        <div class="absolute top-0 right-0 flex space-x-2">
                                            @if ($request_document->docx_status == 'pending')
                                                <x-button.circle wire:key="{{ $request_document->id }}-approve"
                                                    wire:click="approveDocument({{ $request_document->id }},'{{ $request_document->campusDocument->document->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 text-green-600"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </x-button.circle>
                                                <x-button.circle wire:key="{{ $request_document->id }}-deny"
                                                    wire:click="denyDocument({{ $request_document->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 text-red-600"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </x-button.circle>
                                            @elseif ($request_document->docx_status == 'approved' || $request_document->docx_status == 'denied')
                                                <x-button.circle wire:key="{{ $request_document->id }}-undo"
                                                    wire:click="undoAction({{ $request_document->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H10a3 3 0 013 3v1a1 1 0 102 0v-1a5 5 0 00-5-5H8.414l1.293-1.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </x-button.circle>
                                            @else
                                                <span>
                                                    Sorry, Something went wrong.
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
        <section aria-labelledby="summary-heading"
            class="px-4 py-6 mt-16 border rounded-lg bg-gray-50 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
            <h2 id="summary-heading"
                class="text-lg font-medium text-gray-900">Payment summary</h2>
            <dl class="mt-6 space-y-4">
                <div class="flex items-center justify-between">
                    <dt class="text-sm text-gray-600">
                        Document
                    </dt>
                    <dd class="text-sm font-medium text-gray-900">
                        &#8369; {{ $payment->total_document_amount }}
                    </dd>
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <dt class="flex items-center text-sm text-gray-600">
                        <span>
                            Additional Chargers
                        </span>
                    </dt>
                    <dd class="text-sm font-medium text-gray-900">
                        &#8369; {{ $payment->additional_charges }}
                    </dd>
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <dt class="text-base font-medium text-gray-900">Total</dt>
                    <dd class="text-base font-medium text-gray-900">
                        &#8369; {{ $payment->total_document_amount + $payment->additional_charges }}
                    </dd>
                </div>
            </dl>
        </section>
    </form>
</main>
