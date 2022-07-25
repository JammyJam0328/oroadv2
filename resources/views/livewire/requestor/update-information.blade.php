<x-app-layout.requestor>
    <div>
        <x-card shadow="shadow-none"
            title="Update Information">
            <form>
                @csrf
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <x-input wire:model.defer="student_id"
                        type="number"
                        label="Student ID" />
                    <x-input wire:model.defer="first_name"
                        label="First Name" />
                    <x-input wire:model.defer="middle_name"
                        hint="Optional"
                        label="Middle Name" />
                    <x-input wire:model.defer="last_name"
                        label="Last Name" />
                    <div class="md:col-span-2">
                        <x-input wire:model.defer="address"
                            label="Address" />
                    </div>
                    <x-native-select wire:model.defer="sex"
                        label="Sex">
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </x-native-select>
                    <x-input type="number"
                        wire:model.defer="contact_number"
                        label="Contact Number" />
                    <x-native-select label="Campus"
                        wire:model="campus">
                        <option value="">--Select--</option>
                        @foreach ($campuses as $campus)
                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                        @endforeach
                    </x-native-select>
                    <x-native-select wire:model.defer="program"
                        label="Course">
                        <option value="">--Select--</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </x-native-select>
                    <x-native-select wire:model.defer="student_status"
                        label="Student Status">
                        <option value="">--Select--</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="graduated">Graduated</option>
                        <option value="not-graduated">Not Graduated</option>
                    </x-native-select>
                    <div class="space-y-2 md:col-span-2">
                        <div>
                            @if ($valid_id)
                                <img class="h-40 border"
                                    src="{{ Storage::url($this->information->valid_id) }}"
                                    alt="...">
                            @endif
                        </div>
                        <x-input type="file"
                            wire:model="valid_id"
                            accept="image/*"
                            label="Upload Valid ID" />
                        <div>
                            <span wire:loading
                                wire:target="valid_id"
                                class="font-semibold">Uploading new photo. . . </span>
                        </div>
                    </div>
                </div>
            </form>
            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-button type="button"
                        wire:click.prevent="updateInformation"
                        spinner="updateInformation"
                        info>
                        Update
                    </x-button>
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout.requestor>
