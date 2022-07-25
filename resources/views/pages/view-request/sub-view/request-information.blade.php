<section aria-labelledby="notes-title">
    <div class="bg-white  sm:overflow-hidden ">
        <div class=" py-5 ">
            <h2 id="notes-title"
                class="text-lg font-medium text-gray-900">Request Information</h2>
        </div>
        <div class="  py-5 ">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Request Status
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @switch($request->status)
                            @case('finalized')
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @break

                            @case('approved')
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Approved
                                </span>
                            @break

                            @case('payment-to-review')
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    Payment to Review
                                </span>
                            @break

                            @case('ready-to-claim')
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Ready to Claim
                                </span>
                            @break

                            @case('claimed')
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Claimed
                                </span>
                            @break

                            @case('denied')
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-gray-800">
                                    Denied
                                </span>
                            @break

                            @default
                        @endswitch
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Request Code
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->request_code }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Receiver Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 uppercase">
                        {{ $request->receiver_name }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Purpose
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->purpose }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Other Purpose
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $request->other_purpose ?? '--N/A--' }}
                    </dd>
                </div>

            </dl>
        </div>
    </div>
</section>
