<div>
    <x-card title="REQUEST HISOTRY"
        shadow="shadow-sm">
        <div class="overflow-hidden bg-white border rounded-md">
            <ul role="list"
                class="divide-y divide-gray-200">
                @forelse ($requests as $request)
                    <li>
                        <a href="@if ($request->status != 'draft') {{ route('requestor.view-request', ['id' => $request->id]) }}
                           @else
                            {{ route('requestor.finalize-request', ['id' => $request->id]) }} @endif"
                            class="block hover:bg-gray-50 ">
                            <div class="flex items-center px-4 py-2 sm:px-6">
                                <div class="flex items-center flex-1 min-w-0">
                                    <div class="flex-1 min-w-0 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-indigo-600 truncate">
                                                Receiver: {{ $request->receiver_name }}
                                            </p>
                                            <p class="flex items-center mt-2 text-sm text-gray-500">

                                                <span class="truncate">
                                                    Document : {{ $request->request_documents_count }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="hidden md:block">
                                            <div>
                                                <p class="text-sm text-gray-900">
                                                    Applied on
                                                    <time datetime="2020-01-07">
                                                        {{ $request->created_at->format('d M Y') }}
                                                    </time>
                                                </p>
                                                <p class="flex items-center mt-2 text-sm text-gray-500">
                                                    @switch($request->status)
                                                        @case('draft')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                    clip-rule="evenodd" />
                                                            </svg>

                                                            <span>
                                                                Draft
                                                            </span>
                                                        </div>
                                                    @break

                                                    @case('finalized')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                                <path
                                                                    d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                            </svg>
                                                            <span>
                                                                Pending
                                                            </span>
                                                        </div>
                                                    @break

                                                    @case('approved')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-blue-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span>
                                                                Approved
                                                            </span>
                                                        </div>
                                                    @break

                                                    @case('payment-to-review')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-indigo-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                                    clip-rule="evenodd" />
                                                            </svg>

                                                            <span>
                                                                Payment Validation
                                                            </span>
                                                        </div>
                                                    @break

                                                    @case('ready-to-claim')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                                    clip-rule="evenodd" />
                                                            </svg>

                                                            <span>
                                                                Ready to Claim
                                                            </span>
                                                        </div>
                                                    @break

                                                    @case('claimed')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span>
                                                                Claimed
                                                            </span>
                                                        </div>
                                                    @break

                                                    @case('denied')
                                                        <div class="flex items-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-400"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                                                            </svg>
                                                            <span>
                                                                Denied
                                                            </span>
                                                        </div>
                                                    @break
                                                @endswitch

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="w-5 h-5 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                    @empty
                        <li class="px-6 py-4">
                            <div class="grid items-center justify-center">
                                <svg data-name="Layer 1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-52 w-52"
                                    viewBox="0 0 688.13386 510.5"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M903.2874,655.4311a24.14567,24.14567,0,0,0-.00018,48.29134h.00018a24.14567,24.14567,0,0,0,0-48.29134Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#ccc" />
                                    <path id="eddccf5f-d02a-4888-86ae-be237287dc7c-68"
                                        data-name="Path 395"
                                        d="M900.99634,689.60463a2.93038,2.93038,0,0,1-1.76292-.5859l-.03154-.02365-6.64007-5.07945a2.9508,2.9508,0,1,1,3.59065-4.6836l4.30091,3.29814L910.61664,669.271a2.94955,2.94955,0,0,1,4.13542-.54623l.00086.00064-.06308.08758.06479-.08758a2.95312,2.95312,0,0,1,.54559,4.13625L903.346,688.45037a2.95134,2.95134,0,0,1-2.34705,1.15076Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#fff" />
                                    <polygon
                                        points="594.783 499.316 583.351 499.315 577.915 455.219 594.787 455.221 594.783 499.316"
                                        fill="#ffb8b8" />
                                    <path
                                        d="M575.185,496.04845h22.04781a0,0,0,0,1,0,0V509.9304a0,0,0,0,1,0,0H561.30307a0,0,0,0,1,0,0v0A13.88193,13.88193,0,0,1,575.185,496.04845Z"
                                        fill="#2f2e41" />
                                    <polygon
                                        points="549.283 499.316 537.851 499.315 532.415 455.219 549.287 455.221 549.283 499.316"
                                        fill="#ffb8b8" />
                                    <path
                                        d="M529.685,496.04845h22.04781a0,0,0,0,1,0,0V509.9304a0,0,0,0,1,0,0H515.80307a0,0,0,0,1,0,0v0A13.88193,13.88193,0,0,1,529.685,496.04845Z"
                                        fill="#2f2e41" />
                                    <path
                                        d="M859.52294,541.61574a9.377,9.377,0,0,1,1.97613-14.242l-3.54085-21.13341,12.3179-5.28408,4.58121,29.9147a9.42779,9.42779,0,0,1-15.33439,10.74481Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#ffb8b8" />
                                    <path
                                        d="M763.085,531.63a9.377,9.377,0,0,0,.40388-14.37279l6.98357-20.258-11.27569-7.24646-9.46034,28.7468A9.42779,9.42779,0,0,0,763.085,531.63Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#ffb8b8" />
                                    <circle cx="565.70229"
                                        cy="163.07971"
                                        r="24.56103"
                                        fill="#ffb8b8" />
                                    <path
                                        d="M762.32565,516.47412a4.50216,4.50216,0,0,1-1.24536-.17627l-7.15869-2.05517a4.50764,4.50764,0,0,1-3.08765-5.55127l14.77368-52.16211,20.60205-50.5752c2.04859-5.02783,6.32862-8.32519,11.16992-8.605a11.44643,11.44643,0,0,1,10.77808,6.27686h0a15.62084,15.62084,0,0,1,.35693,13.7705l-23.417,51.21045-18.61621,45.0835A4.49773,4.49773,0,0,1,762.32565,516.47412Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#6c63ff" />
                                    <path
                                        d="M835.49548,378.427l-13.64656.24261a9.07354,9.07354,0,0,1-8.8959-11.58969,21.127,21.127,0,0,0,.65552-3.01274,15.22492,15.22492,0,0,0,.08978-3.35353,4.952,4.952,0,0,0-9.55443-1.40837v0c-2.29461.03269-7.18294-.71534-9.47755-.68265-4.87206-12.48982,5.74491-28.83323,17.17382-34.97183,11.65126-6.258,26.77521.10869,31.24139,13.15167,6.19839.11141,11.23462,6.22466,12.03341,13.10631s-2.03239,14.06747-6.36329,19.3418S838.73416,378.36942,835.49548,378.427Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#2f2e41" />
                                    <path
                                        d="M790.63742,689.94922a4.51451,4.51451,0,0,1-4.46143-4.00977L781.11251,515.7041l63.78736,4.54053.04907.41016c14.41479,120.66259,9.4873,162.43164,9.43579,162.83935a4.49832,4.49832,0,0,1-5.07544,4.20264l-14.09668.33789a4.49787,4.49787,0,0,1-3.989-4.2959L818.05221,560.439a1.40645,1.40645,0,0,0-1.46606-1.05615,1.46265,1.46265,0,0,0-1.43921,1.17725l-5.08862,123.70361a4.48067,4.48067,0,0,1-4.04126,4.67041l-14.93238.99268A4.459,4.459,0,0,1,790.63742,689.94922Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#2f2e41" />
                                    <path
                                        d="M817.10592,536.04492c-.38159,0-.76245-.00586-1.145-.01758-18.34179-.55224-32.69165-14.4292-36.65258-18.66943a4.47811,4.47811,0,0,1-1.0813-4.09717l10.5813-44.76416-2.80738-38.917a38.36931,38.36931,0,0,1,10.50562-29.6333,31.66346,31.66346,0,0,1,24.38647-9.86572c17.855.852,31.94141,16.81152,32.06861,36.33252.19751,30.23486-.69263,32.312-.98487,32.99462-8.91089,20.79688-4.04419,49.98926-2.34033,58.44141a4.5164,4.5164,0,0,1-1.33716,4.1875C838.499,531.33545,828.00924,536.04443,817.10592,536.04492Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#6c63ff" />
                                    <path
                                        d="M863.17062,524.666a4.4966,4.4966,0,0,1-4.38037-3.49414L847.8735,473.61475l-14.63061-54.35743a15.62109,15.62109,0,0,1,2.62719-13.52246,11.45551,11.45551,0,0,1,11.66651-4.41015c4.72876,1.07617,8.40527,5.03515,9.595,10.33252l11.95483,53.229,5.9624,53.94092a4.50858,4.50858,0,0,1-3.96264,4.96484l-7.39991.84424A4.48708,4.48708,0,0,1,863.17062,524.666Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#6c63ff" />
                                    <path d="M548.93307,246.75h-267a26,26,0,0,1,0-52h267a26,26,0,0,1,0,52Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#e6e6e6" />
                                    <path d="M281.93307,203.25a17.5,17.5,0,0,0,0,35h267a17.5,17.5,0,0,0,0-35Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#fff" />
                                    <path
                                        d="M643.2874,196.4311a24.14567,24.14567,0,0,0-.00018,48.29134h.00018a24.14567,24.14567,0,0,0,0-48.29134Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#6c63ff" />
                                    <path id="ad0a0ef9-b94e-459b-a18b-5e864c4f85bd-69"
                                        data-name="Path 395"
                                        d="M640.99634,230.60463a2.93038,2.93038,0,0,1-1.76292-.5859l-.03154-.02365-6.64007-5.07945a2.9508,2.9508,0,1,1,3.59065-4.6836l4.30091,3.29814,10.16327-13.25912a2.94955,2.94955,0,0,1,4.13542-.54623l.00086.00064-.06308.08758.06479-.08758a2.95312,2.95312,0,0,1,.54559,4.13625L643.346,229.45037a2.95134,2.95134,0,0,1-2.34705,1.15076Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#fff" />
                                    <path d="M548.93307,334.75h-267a26,26,0,0,1,0-52h267a26,26,0,0,1,0,52Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#e6e6e6" />
                                    <path d="M281.93307,291.25a17.5,17.5,0,0,0,0,35h267a17.5,17.5,0,0,0,0-35Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#fff" />
                                    <path
                                        d="M643.2874,284.4311a24.14567,24.14567,0,0,0-.00018,48.29134h.00018a24.14567,24.14567,0,0,0,0-48.29134Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#6c63ff" />
                                    <path id="b52aca83-db19-4a50-956a-5cae2a617b83-70"
                                        data-name="Path 395"
                                        d="M640.99634,318.60463a2.93038,2.93038,0,0,1-1.76292-.5859l-.03154-.02365-6.64007-5.07945a2.9508,2.9508,0,1,1,3.59065-4.6836l4.30091,3.29814,10.16327-13.25912a2.94955,2.94955,0,0,1,4.13542-.54623l.00086.00064-.06308.08758.06479-.08758a2.95312,2.95312,0,0,1,.54559,4.13625L643.346,317.45037a2.95134,2.95134,0,0,1-2.34705,1.15076Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#fff" />
                                    <path d="M548.93307,422.75h-267a26,26,0,0,1,0-52h267a26,26,0,0,1,0,52Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#e6e6e6" />
                                    <path d="M281.93307,379.25a17.5,17.5,0,0,0,0,35h267a17.5,17.5,0,0,0,0-35Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#fff" />
                                    <path
                                        d="M643.2874,372.4311a24.14567,24.14567,0,0,0-.00018,48.29134h.00018a24.14567,24.14567,0,0,0,0-48.29134Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#e6e6e6" />
                                    <path d="M943.06693,705.25h-209a1,1,0,0,1,0-2h209a1,1,0,0,1,0,2Z"
                                        transform="translate(-255.93307 -194.75)"
                                        fill="#ccc" />
                                </svg>
                                <div>
                                    <h1 class="text-xl text-gray-600">
                                        Make your first request
                                    </h1>
                                </div>
                            </div>
                        </li>
                    @endforelse

                </ul>
            </div>
        </x-card>

    </div>
