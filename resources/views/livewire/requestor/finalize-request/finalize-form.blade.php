<div>
    <x-card shadow="shadow-sm"
        title="FINALIZE REQUEST">
        <div class="mt-10 lg:mt-0">
            <h2 class="text-lg font-medium text-gray-900">
                Document Summary
            </h2>
            <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <h3 class="sr-only">Items in your cart</h3>
                <ul role="list"
                    class="divide-y divide-gray-200">
                    @foreach ($request_documents as $key => $request_document)
                        @livewire('requestor.finalize-request.request-item',[
                        'request_document'=>$request_document,],key($key.'.'.$request_document->id))
                    @endforeach
                </ul>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end space-x-3">
                <x-button>
                    Do it later
                </x-button>
                <x-button wire:click.prevent="confirmFinalize"
                    spinner="confirmFinalize"
                    info>
                    Submit
                </x-button>
            </div>
        </x-slot>
    </x-card>
</div>
