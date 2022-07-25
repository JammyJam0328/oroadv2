<x-app-layout.requestor>
    <div>
        <x-card shadow="shadow-none"
            title="Request Information">
            <div class="grid space-y-4">
                <div id="payment-form">
                    @if ($request->status == 'approved')
                        <x-card shadow="shadow-none"
                            color="border-blue-600 border"
                            title="Payment Form">
                            <div class="mb-5">
                                <dl class="text-sm font-medium text-gray-500 space-y-6">
                                    <div class="flex justify-between">
                                        <dt>Document(s) Total Amount</dt>
                                        <dd class="text-gray-900">
                                            &#8369; {{ $request->payment->total_document_amount }}
                                        </dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt>Additional Charges</dt>
                                        <dd class="text-gray-900">
                                            &#8369; {{ $request->payment->additional_charges }}
                                        </dd>
                                    </div>

                                    <div class="flex justify-between text-gray-900 font-bold bg-gray-100 p-2 border">
                                        <dt>Total Amount to Pay</dt>
                                        <dd class="">
                                            &#8369; {{ $request->payment->total_amount_to_pay }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                            <hr>
                            <form class="mt-5">
                                @csrf
                                <div class="grid space-y-4">
                                    <div>
                                        <x-input wire:model.defer="reference_number"
                                            label="Reference Number" />
                                    </div>
                                    <div>
                                        <x-input wire:model.debounce.500ms="proof_of_payment"
                                            label="Proof of payment (Actual image or Screenshot of receipt)"
                                            type="file"
                                            multiple
                                            ac
                                            cept="image/*" />
                                        <div>
                                            <div id="uploading-indicator">
                                                <h1 class="text-gray-600 animate-pulse"
                                                    wire:loading
                                                    wire:target="proof_of_payment">Uploading...</h1>
                                            </div>
                                            <div id="doneUploading-indicator">
                                                @if (count($proof_of_payment) > 0)
                                                    <h1 class="text-green-600">{{ count($proof_of_payment) }} File(s)
                                                        Uploaded
                                                    </h1>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <x-slot name="footer">
                                <div class="flex justify-end space-x-2">
                                    <x-button wire:click.prevent="submitPayment"
                                        spinner="submitPayment"
                                        info>
                                        Submit Payment
                                    </x-button>
                                </div>
                            </x-slot>
                        </x-card>
                    @elseif ($request->status == 'ready-to-claim')
                        <div class="rounded-md bg-green-50 p-4 border border-green-300">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/check-circle -->
                                    <svg class="h-5 w-5 text-green-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-green-800">
                                        Request is ready to be claimed
                                    </h3>
                                    <div class="mt-2 text-sm text-green-700">
                                        <p>
                                            Please claim your request on
                                            {{ date('F j, Y', strtotime($request->retrieval_date)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
                <div id="request-information"
                    class="grid py-5 space-x-3 sm:grid-cols-6">
                    <div class="space-y-4 sm:col-span-6">
                        <div class="overflow-hidden bg-white border sm:rounded-lg">
                            <div class="px-4 py-5 border-gray-200 sm:p-0">
                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Status
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            @switch($request->status)
                                                @case('finalized')
                                                    <div class="flex items-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span>
                                                            Pending
                                                        </span>
                                                    </div>
                                                @break

                                                @case('approved')
                                                    <div class="flex items-center ">
                                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-blue-400"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span>
                                                            Approved
                                                        </span>
                                                    </div>
                                                @break

                                                @case('payment-to-review')
                                                    <div class="flex items-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-indigo-400"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span>
                                                            Payment Validation
                                                        </span>
                                                    </div>
                                                @break

                                                @case('ready-to-claim')
                                                    <div class="flex items-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                        <span>
                                                            Ready to Claim
                                                        </span>
                                                    </div>
                                                @break

                                                @case('claimed')
                                                    <div class="flex items-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path
                                                                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                        </svg>
                                                        <span>
                                                            Claimed
                                                        </span>
                                                    </div>
                                                @break

                                                @case('denied')
                                                    <div class="flex items-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-400"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span>
                                                            Denied
                                                        </span>
                                                    </div>
                                                @break
                                            @endswitch
                                        </dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Request Code
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $request->request_code }}
                                        </dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Receiver Name
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $request->receiver_name }}
                                        </dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Purpose
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $request->purpose }}
                                        </dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Other Purpose
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $request->other_purpose }}
                                        </dd>
                                    </div>

                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Time Stamp
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <div class="space-y-2">
                                                <h1>
                                                    Created at :
                                                    {{ $request->created_at->format('F d, Y H:i A') }}
                                                </h1>
                                                <h1>
                                                    Last Modified :
                                                    {{ $request->updated_at->format('F d, Y H:i A') }}
                                                </h1>
                                            </div>
                                        </dd>
                                    </div>
                                    @if ($request->status != 'finalized')
                                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Remarks
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <ul role="list"
                                                    class="-my-5 divide-y divide-gray-200">
                                                    @forelse ($request->remarks as $key=>$remark)
                                                        <li wire:key="{{ $key }}{{ $remark->id }}-remark"
                                                            class="py-5">
                                                            <div
                                                                class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                                                <h3 class="text-sm font-semibold text-gray-800">
                                                                    <div>
                                                                        <span class="absolute inset-0"
                                                                            aria-hidden="true"></span>
                                                                        Created at
                                                                        {{ $remark->created_at->format('F d, Y') }}
                                                                    </div>
                                                                </h3>
                                                                <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                                    {{ $remark->message }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li class="py-5">
                                                            <div
                                                                class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                                                <h3 class="text-sm text-gray-600">
                                                                    <a href="#"
                                                                        class="text-center hover:underline focus:outline-none">
                                                                        <span class="absolute inset-0"
                                                                            aria-hidden="true"></span>
                                                                        No remarks yet
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                        </li>
                                                    @endforelse
                                                </ul>
                                            </dd>
                                        </div>
                                    @endif
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Request Document/s
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <ul>
                                                @foreach ($request->requestDocuments as $document)
                                                    <li>
                                                        {{ $document->campusDocument->document->name }}
                                                        ({{ $document->docx_status }})
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-app-layout.requestor>
