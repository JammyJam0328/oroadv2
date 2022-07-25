<div>
    <section x-intersect.once="$wire.setReady()"
        aria-labelledby="notes-title">
        <div class="bg-white sm:overflow-hidden">
            <div class="divide-y divide-gray-200">
                <div>
                    <ul role="list"
                        class="px-3 space-y-8">
                        @forelse ($remarks as $remarks)
                            <li>
                                <div class="flex space-x-3">
                                    <div>
                                        <div class="text-sm">
                                            <a href="#"
                                                class="font-medium text-gray-900">
                                                {{ $remarks->created_at->format('M d, Y ') }}
                                            </a>
                                        </div>
                                        <div class="mt-1 text-sm text-gray-700">
                                            <p>
                                                {{ $remarks->message }}
                                            </p>
                                        </div>
                                        <div class="mt-2 space-x-2 text-sm">
                                            <span class="font-medium text-gray-500">
                                                {{ $remarks->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="flex items-center justify-center w-full py-10">
                                <div wire:loading
                                    wire:target="setReady">
                                    Loading...
                                </div>
                                <div>
                                    <div wire:loading.remove
                                        class="text-gray-500">
                                        No remarks yet.
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="px-4 py-6 mt-3 rounded-md bg-gray-50 sm:px-6">
                <div class="flex space-x-3">
                    <div class="flex-1 min-w-0">
                        <form>
                            @csrf
                            <div>
                                <x-textarea wire:model.defer="remark"
                                    placeholder="Start typing ..." />
                            </div>
                            <div class="flex items-center justify-end mt-3">
                                <x-button wire:click="addremarks"
                                    info>
                                    Add remarks</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
