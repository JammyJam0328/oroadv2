<div>
    <section aria-labelledby="order-heading"
        class="px-4">
        <div class=" mx-auto">
            <div id="disclosure-1">
                <dl class="text-sm font-medium text-gray-500 mt-5 space-y-6">
                    <h2 id="applicant-information-title"
                        class="text-lg leading-6 font-medium text-gray-900">Payment Details</h2>
                    <div class="flex justify-between">
                        <dt>Document Amount</dt>
                        <dd class="text-gray-900">
                            {{ $payment->total_document_amount }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="flex">
                            Additional Charges

                        </dt>
                        <dd class="text-gray-900"> {{ $payment->additional_charges }}</dd>
                    </div>

                </dl>
            </div>
            <p
                class="flex items-center justify-between text-sm font-medium text-gray-900 border-t border-gray-200 pt-6 mt-6">
                <span class="text-base">Total</span>
                <span class="text-base">&#8369;
                    {{ $payment->total_document_amount + $payment->additional_charges }}</span>
            </p>
            @if ($request_status == 'finalized')
                <form class="mt-5">
                    @csrf
                    <label for="discount-code-mobile"
                        class="block text-sm font-medium text-gray-700">Additional Fee</label>
                    <div class="flex space-x-4 mt-1">
                        <input type="text"
                            wire:model.defer="additional_charges"
                            id="discount-code-mobile"
                            name="discount-code-mobile"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-200 focus:border-gray-200 sm:text-sm">
                        <x-button type="button"
                            wire:click="addCharge"
                            flat
                            gray>Apply</x-button>
                    </div>
                </form>
            @endif
        </div>
    </section>
    @if ($request_status == 'finalized')
        <div class="mt-3 border-t p-4  bg-gray-100">
            <div class="flex space-x-3 justify-end">
                <x-button wire:click="approveRequest"
                    spinner="approveRequest"
                    info>
                    Approve
                </x-button>
                <x-button negative>
                    Deny
                </x-button>
            </div>
        </div>
    @endif
</div>
