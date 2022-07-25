<div>
    <div class="sm:flex sm:justify-between">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Request Details</h3>
            <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Current status: @if ($this->request->status == 'approved')
                    <span class="text-blue-600 uppercase">
                        Approved
                    </span>
                @endif
            </p>
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
                ['request_id' => $request_id,'request_status'=>'approved',
                'requestor_current_status'=>$this->request->requestor_current_status,])
            </x-card>
        </div>
        <div class="space-y-3 sm:col-span-2">
            @livewire('components.request-payment-details',
            ['request_id' => $this->request_id])
        </div>
    </div>
</div>
