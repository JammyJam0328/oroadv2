<section aria-labelledby="applicant-information-title">
    <div class="bg-white ">
        <div class=" py-5 ">
            <h2 id="applicant-information-title"
                class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h2>
        </div>
        <div class="  py-5 ">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->user->information->first_name }}
                        {{ $request->user->information->middle_name }}
                        {{ $request->user->information->last_name }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 uppercase">
                        {{ $request->user->information->student_status }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Student ID
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->user->information->student_id }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->user->information->address }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->user->information->contact_number }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Sex</dt>
                    <dd class="mt-1 text-sm text-gray-900 uppercase">
                        {{ $request->user->information->sex }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Program
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->user->information->program->name }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Campus
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->user->information->program->campus->name }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Valid ID
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <a href="{{ \Storage::url($request->user->information->valid_id) }}"
                            class="text-blue-500 hover:text-blue-700 cursor-pointer"
                            target="_black">
                            View valid ID
                        </a>
                    </dd>
                </div>
                {{-- <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">About</dt>
                                        <dd class="mt-1 text-sm text-gray-900">Fugiat ipsum ipsum deserunt culpa aute sint
                                            do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip
                                            consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure
                                            nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <ul role="list"
                                                class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                                            resume_front_end_developer.pdf </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#"
                                                            class="font-medium text-blue-600 hover:text-blue-500"> Download
                                                        </a>
                                                    </div>
                                                </li>

                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                                            coverletter_front_end_developer.pdf </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#"
                                                            class="font-medium text-blue-600 hover:text-blue-500"> Download
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </dd>
                                    </div> --}}
            </dl>
        </div>

    </div>
</section>
