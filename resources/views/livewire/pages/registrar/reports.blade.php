    <div x-data="{
        printDiv() {
            var printContents = document.getElementById('print-area').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        },
    }"
        class="py-6"
        class="py-6">
        <div class="px-4 mx-auto text-gray-600 max-w-7xl sm:px-6 md:px-8">
            <x-card shadow="shadow-none"
                padding="px-2 py-2.5 md:px-4 ">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-8 h-8 text-emerald-400"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                clip-rule="evenodd" />
                        </svg>
                        <h1 class="text-xl font-semibold">
                            Reports
                        </h1>
                    </div>
                    <div class="flex space-x-2">
                        <x-button label="Print"
                            icon="printer"
                            x-on:click="printDiv()"></x-button>

                    </div>
                </div>
            </x-card>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <div class="py-4">
                <div>
                    <x-card id="print-area"
                        shadow="shadow-none">
                        @livewire('pages.registrar.reports.requests-range-date')
                    </x-card>
                </div>

            </div>
        </div>
    </div>
