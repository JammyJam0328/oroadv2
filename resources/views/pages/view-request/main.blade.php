@extends('layouts.registrar.app')

@section('main')
    <div class="py-6">
        <template x-teleport="#back_button">
            <div class="flex space-x-2">
                <a type="button"
                    href="{{ route('registrar.v2-requests') }}"
                    class="flex items-center space-x-2 bg-transparent focus:outline-none group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <h1>Request List</h1>
                </a>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <nav class="flex"
                    aria-label="Breadcrumb">
                    <ol role="list"
                        class="flex items-center space-x-4">

                        <li>
                            <div class="flex items-center">
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="#"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                    aria-current="page">
                                    {{ $request->user->information->first_name }}
                                    {{ $request->user->information->middle_name }}
                                    {{ $request->user->information->last_name }} 's Request
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

        </template>
        <div class="px-4 pb-5 sm:px-6 md:px-0">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10 text-green-500"
                    viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="text-2xl font-semibold text-gray-700">
                    {{ $request->user->information->first_name }}
                    {{ $request->user->information->middle_name }}
                    {{ $request->user->information->last_name }}
                </h1>
            </div>
        </div>
        <hr>
        <div class="mt-5">
            <div class="flex items-center justify-end space-x-3">
                <x-button flat
                    info>
                    Approve
                </x-button>
                <x-button flat
                    negative>
                    Deny
                </x-button>
            </div>
        </div>
        @livewire('view-request.requested-documents', [
            'is_graduated' => $request->requestor_current_status == 'graduated' ? true : false,
            'request_id' => $request->id,
            'request_status' => $request->status,
        ])
        <div class="mt-5">
            <x-card shadow="shadow-none"
                color="bg-gray-50 border border-gray-200">
                <div class="overflow-hidden ">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Request Information</h3>
                    </div>
                    <div class="mt-5 border-gray-200">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1 text-sm text-gray-900 ">
                                    <x-shared.request-status :status="$request->status" />
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Reciever Name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->receiver_name }}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Purpose</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->purpose }}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Other Purpose</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->other_purpose ?? 'N/A' }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Retrieval Date
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->retrieval_date ?? 'N/A' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="mt-5">
            <x-card shadow="shadow-none"
                color="bg-gray-50 border border-gray-200">
                <div class="overflow-hidden ">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Applicant Information</h3>
                    </div>
                    <div class="mt-5 border-gray-200">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Student ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->student_id }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1 text-sm text-gray-900 uppercase">
                                    {{ $request->user->information->student_status }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->first_name }}
                                    {{ $request->user->information->middle_name }}
                                    {{ $request->user->information->last_name }}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Sex</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->sex }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->contact_number }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Address</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->address }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Campus</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->program->campus->name }}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Program</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $request->user->information->program->name }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

            </x-card>
        </div>

        {{-- <div class="px-4 mt-6 border-t sm:px-6 md:px-0">
            <div class="grid grid-cols-1 gap-6 mx-auto divide-x lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                <div x-data="{ tab: '1' }"
                    class=" lg:col-start-1 lg:col-span-2">
                    <div>
                        <div class="sm:hidden">
                            <label for="tabs"
                                class="sr-only">Select a tab</label>
                            <select id="tabs"
                                name="tabs"
                                class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>My Account</option>

                                <option>Company</option>

                                <option selected>Team Members</option>

                                <option>Billing</option>
                            </select>
                        </div>
                        <div class="hidden sm:block">
                            <div class="border-b border-gray-200">
                                <nav class="flex -mb-px space-x-8"
                                    aria-label="Tabs">
                                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                    <button x-on:click="tab = '1'"
                                        x-bind:class="{
                                            'border-gray-500 text-gray-600': tab ===
                                                '1',
                                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !==
                                                '1'
                                        }"
                                        class="px-1 py-4 text-sm font-medium border-b-2 whitespace-nowrap">
                                        Request Information
                                    </button>

                                    <button x-on:click="tab = '2'"
                                        x-bind:class="{
                                            'border-gray-500 text-gray-600': tab ===
                                                '2',
                                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !==
                                                '2'
                                        }"
                                        class="px-1 py-4 text-sm font-medium border-b-2 whitespace-nowrap">
                                        Applicant Information
                                    </button>
                                    <button x-on:click="tab = '3'"
                                        x-bind:class="{
                                            'border-gray-500 text-gray-600': tab ===
                                                '3',
                                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !==
                                                '3'
                                        }"
                                        class="px-1 py-4 text-sm font-medium border-b-2 whitespace-nowrap">
                                        Remarks
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class=" lg:col-start-1 lg:col-span-2">
                        <div x-cloak
                            x-show="tab=='1'">
                            @include('pages.view-request.sub-view.request-information')
                        </div>
                        <div x-cloak
                            x-show="tab=='2'">
                            @include('pages.view-request.sub-view.applicant-information')
                        </div>
                        <div x-cloak
                            x-show="tab=='3'">
                            <div class="py-5">
                                @livewire('view-request.remarks', [
                                    'request_id' => $request->id,
                                ])
                            </div>
                        </div>

                    </div>

                </div>
                <section aria-labelledby="timeline-title"
                    class="space-y-3 divide-y lg:col-start-3 lg:col-span-1">
                    @if ($request->status == 'ready-to-claim')
                        @livewire('view-request.ready-to-claim', [
                            'request_id' => $request->id,
                            'request_status' => $request->status,
                        ])
                    @endif
                    @if ($request->status == 'payment-to-review')
                        @livewire('view-request.payment-approve', [
                            'request_id' => $request->id,
                            'request_status' => $request->status,
                            'retrieval_date' => $request->retrieval_date,
                        ])
                    @endif

                    @livewire('view-request.requested-documents', [
                        'request_id' => $request->id,
                        'request_status' => $request->status,
                    ])
                    @livewire('view-request.payment-process', [
                        'request_id' => $request->id,
                        'request_status' => $request->status,
                    ])
                </section>
            </div>
        </div> --}}
    </div>
@endsection
