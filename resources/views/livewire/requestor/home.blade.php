<x-app-layout.requestor>
    <div class="grid space-y-2">
        <div class="flex justify-end">
            @if ($requestDocument == false)
                <x-button wire:click="$set('requestDocument',true)"
                    spinner
                    green>
                    Request Document
                </x-button>
            @endif
        </div>
        <div>
            @if ($requestDocument)
                <div id="request-form">
                    @livewire('requestor.home.request-form')
                </div>
            @else
                <div id="users-request-history">
                    @livewire('requestor.home.request-history')
                </div>
            @endif
        </div>
    </div>
</x-app-layout.requestor>
