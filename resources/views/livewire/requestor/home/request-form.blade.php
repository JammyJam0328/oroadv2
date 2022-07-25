<div>
    <x-card shadow="shadow-sm"
        title="Request Form">
        <form>
            @csrf
            <div>
                <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">
                    Select Documents
                </h2>
                <ul role="list"
                    class="grid grid-cols-1 gap-5 mt-3 sm:gap-6 sm:grid-cols-2 lg:grid-cols-2">
                    @foreach ($campus_documents as $key => $document)
                        <li wire:key="{{ $key }}{{ $document->id }}"
                            wire:click="selectedDocument({{ $document->id }})"
                            class="cursor-pointer flex col-span-1 rounded-md  {{ in_array($document->id, $selected_documents) ? 'bg-green-600 shadow-xl' : 'bg-gray-600 shadow-sm  hover:shadow-xl' }}">
                            <div
                                class=" {{ in_array($document->id, $selected_documents) ? 'bg-green-600' : 'bg-gray-600' }}   flex items-center justify-center flex-shrink-0 w-10 text-sm font-medium text-white rounded-l-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-3 h-3"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div
                                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                                <p class="flex px-4 py-2 text-xs break-words md:text-sm md:truncate">
                                    {{ $document->document->name }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="grid grid-cols-1 gap-4 pt-5 mt-5 border-t sm:grid-cols-2">
                    <x-input label="Receiver Name"
                        wire:model.defer='receiver_name' />
                    <x-native-select label="Purpose"
                        wire:model="purpose">
                        <option value="">--Select--</option>
                        @foreach ($purposes as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </x-native-select>
                    <div>
                        @if ($purpose == 'Others')
                            <x-input label="Other Purpose"
                                wire:model.defer='other_purpose' />
                        @endif
                    </div>
                </div>
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end space-x-3">
                <x-button wire:click="$emitUp('cancelRequest')"
                    class="text-red-600">
                    Cancel
                </x-button>
                <x-button wire:click.prevent="submit"
                    spinner="submit"
                    info>
                    Submit
                </x-button>
            </div>
        </x-slot>
    </x-card>
</div>
