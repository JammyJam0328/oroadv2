<div class="space-y-4">
    <div id="payment-details">
        <x-card class="relative"
            shadow="shadow-none">
            <div>
                <div wire:loading.flex
                    class="absolute top-0 right-0 flex items-center justify-center w-full h-full border rounded-md bg-gray-50 opacity-90">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-10 h-10 text-gray-800 animate-bounce"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <section aria-labelledby="summary-heading"
                class="rounded-lg lg:mt-0 lg:col-span-5">
                <div class="flex mb-3 space-x-2">
                    <x-icon name="cash"
                        style="solid"
                        class="w-5 h-5 text-blue-600" />
                    <h1 class="text-lg">
                        Payment Details
                    </h1>
                </div>
                <dl class="space-y-4 ">
                    <div class="flex items-center justify-between">
                        <dt class="text-sm text-gray-600">Document Amount</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            &#8369; {{ $payment->total_document_amount }}
                        </dd>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <dt class="flex items-center text-sm text-gray-600">
                            <span>
                                Additional Charges
                            </span>
                        </dt>
                        <dd class="text-sm font-medium text-gray-900">
                            &#8369; {{ $payment->additional_charges }}
                        </dd>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <dt class="text-base font-medium text-gray-900">
                            Total Amount
                        </dt>
                        <dd class="text-base font-medium text-gray-900">
                            &#8369; {{ $payment->additional_charges + $payment->total_document_amount }}
                        </dd>
                    </div>
                </dl>
            </section>
        </x-card>
    </div>
    <div id="show-remarks-div"
        x-data="{ isOpen: false }"
        id="remarks-list">
        <div id="show-remarks">
            <x-button x-on:click="isOpen=!isOpen"
                class="w-full"
                icon="chat-alt-2"
                gray>
                Remarks</x-button>
        </div>
        <div x-cloak
            x-show="isOpen"
            x-collapse
            id="list-collapse"
            class="mt-3">
            <x-card shadow="shadow-none">
                <div>
                    <div class="flow-root ">
                        <ul role="list"
                            class="-my-5 divide-y divide-gray-200">
                            @forelse ($payment->request->remarks as $key=>$remark)
                                <li wire:key="{{ $key }}{{ $remark->id }}-remark"
                                    class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                        <h3 class="text-sm font-semibold text-gray-800">
                                            <a href="#"
                                                class="hover:underline focus:outline-none">
                                                <span class="absolute inset-0"
                                                    aria-hidden="true"></span>
                                                Created at {{ $remark->created_at->format('F d, Y') }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                            {{ $remark->message }}
                                        </p>
                                    </div>
                                </li>
                            @empty
                                <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
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
                    </div>
                </div>
            </x-card>
        </div>
    </div>
    <div id="form-for-payment-and-remarks">
        @if ($payment->request->status != 'claimed')
            <x-card shadow="shadow-none">
                <form class="space-y-2">
                    @csrf
                    <div id="payments-form">
                        @if ($payment->request->status == 'finalized')
                            <div class="flex w-full space-x-2 ">
                                <x-input label="Additional Charges"
                                    wire:model.defer='additional_charge'
                                    type="number">
                                    <x-slot name="append">
                                        <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                                            <x-button class="h-full rounded-r-md"
                                                wire:click="updateAdditionalCharge"
                                                icon="plus"
                                                info
                                                squared />
                                        </div>
                                    </x-slot>
                                </x-input>
                            </div>
                        @endif
                    </div>
                    <div id="remarks-form">
                        <div class="space-y-3">
                            <x-textarea label="Remarks"
                                wire:model.defer='remarks'
                                placeholder="Your remarks" />
                            <div class="flex justify-end">
                                <x-button wire:click="submitRemarks"
                                    icon="chat-alt"
                                    spinner="submitRemarks"
                                    info>
                                    Submit Remarks
                                </x-button>
                            </div>
                        </div>
                    </div>
                </form>
            </x-card>
        @endif
    </div>
</div>
