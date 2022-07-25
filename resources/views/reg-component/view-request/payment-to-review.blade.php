<div>
    <div class="sm:flex sm:justify-between">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Request Details</h3>
            <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Current status: @if ($this->request->status == 'payment-to-review')
                    <span class="text-indigo-600 uppercase">
                        Payment to Review
                    </span>
                @endif
            </p>
        </div>
    </div>
    <div class="py-3">
        <div class="overflow-hidden bg-white border sm:rounded-lg">
            <div class="flex items-center justify-between px-4 py-5 sm:px-6">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Payment Details
                    </h3>
                </div>
                <div class="flex space-x-3">
                    <x-button wire:click="approvePayment"
                        spinner="approvePayment"
                        info>
                        Approve
                    </x-button>
                    <x-button negative>
                        Deny
                    </x-button>
                </div>
            </div>
            <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Reference Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $this->request->payment->reference_number }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Proof of Payment
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center space-x-2">
                                @foreach ($this->request->payment->proofs as $key => $proof)
                                    <a type="button"
                                        href="{{ \Illuminate\Support\Facades\Storage::url($proof->file_id) }}"
                                        target="_blank">
                                        <span
                                            class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            View Image : # {{ $key + 1 }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ $this->request->retrieval_date ? 'Retrieval Date' : 'Set Retrieval Date' }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input type="date"
                                wire:model.debounce.500ms="retrieval_date" />
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="grid py-5 space-x-3 sm:grid-cols-6">
        <div class="space-y-4 sm:col-span-4">
            <div class="overflow-hidden bg-white border sm:rounded-lg">
                <div class="px-4 py-5 border-gray-200 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Receiver Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $this->request->receiver_name }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Purpose
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $this->request->purpose }}
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Other Purpose
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $this->request->other_purpose }}
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
                                        {{ $this->request->created_at->format('F d, Y H:i A') }}
                                    </h1>
                                    <h1>
                                        Last Modified :
                                        {{ $this->request->updated_at->format('F d, Y H:i A') }}
                                    </h1>
                                </div>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <x-card shadow="shadow-none">
                @livewire('components.request-documents',
                ['request_id' => $request_id,'request_status'=>'payment-to-review',
                'requestor_current_status'=>$this->request->requestor_current_status,])
            </x-card>
        </div>
        <div class="space-y-3 sm:col-span-2">
            @livewire('components.request-payment-details',
            ['request_id' => $this->request_id])
        </div>
    </div>
</div>
