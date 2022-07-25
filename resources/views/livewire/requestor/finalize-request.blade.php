<x-app-layout.requestor>
    <div>
        @if ($this->request->status == 'finalized')
            <div class="p-4 border rounded-md bg-blue-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-400"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1 ml-3 md:flex md:justify-between">
                        <p class="text-sm text-blue-700">
                            Request has been submitted.
                        </p>
                    </div>
                </div>
            </div>
        @elseif($this->request->status == 'draft')
            @livewire('requestor.finalize-request.finalize-form',['request'=>$this->request])
        @else
            <div class="p-4 rounded-md bg-yellow-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-yellow-400"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">
                            System Message
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                Looks like your request has been processed.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout.requestor>
