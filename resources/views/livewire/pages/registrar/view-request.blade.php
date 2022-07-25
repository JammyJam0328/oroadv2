    <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <div class="py-4 space-y-5">
                <x-card shadow="shadow-none">
                    <div class="pb-2 space-y-2">
                        <div class="p-1 text-white rounded bg-dominant">{{ $this->request->request_code }}</div>
                    </div>
                    @switch($this->request->status)
                        @case('finalized')
                            <div id="pending-c9r8ncafadsfcnc">
                                @include('reg-component.view-request.pending')
                            </div>
                        @break

                        @case('approved')
                            <div id="approved-9imcxclkvmseiuf">
                                @include('reg-component.view-request.approved')
                            </div>
                        @break

                        @case('payment-to-review')
                            <div id="payment-to-review9imcxclkvmseiuf">
                                @include('reg-component.view-request.payment-to-review')
                            </div>
                        @break

                        @case('ready-to-claim')
                            <div id="ready-to-claim9imcxclkvmseiuf">
                                @include('reg-component.view-request.ready-to-claim')
                            </div>
                        @break

                        @case('claimed')
                            <div id="claimed9imcxclkvmseiuf">
                                @include('reg-component.view-request.claimed')
                            </div>
                        @break

                        @default
                            <div>
                                Something went wrong. Try refreshing the page.
                            </div>
                    @endswitch
                </x-card>
                {{-- requestor information --}}
                <x-card shadow="shadow-none">
                    <div class="overflow-hidden bg-white border sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Requestor Information
                            </h3>
                        </div>
                        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                            <dl class="sm:divide-y sm:divide-gray-200">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Student Number
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->request->user->information->student_id }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->request->user->information->last_name }},
                                        {{ $this->request->user->information->first_name }}
                                        {{ $this->request->user->information->middle_name }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Sex
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->request->user->information->sex }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->request->user->information->address }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Contact number
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->request->user->information->contact_number }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Student Status
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 uppercase sm:mt-0 sm:col-span-2">
                                        {{ $this->request->user->information->student_status }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Valid ID</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a href="{{ Storage::url($this->request->user->information->valid_id) }}"
                                            class="text-blue-700 underline "
                                            target="_blank">
                                            View Valid ID
                                        </a>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                </x-card>
            </div>
        </div>
    </div>
