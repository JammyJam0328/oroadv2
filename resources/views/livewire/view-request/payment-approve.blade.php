<div>
    <div class="p-3">
        <h2 id="proof-of-payment"
            class="text-lg font-medium text-gray-900">
            Proof of Payment
        </h2>
        <div id="list-image"
            class="grid grid-cols-3 gap-2 mt-2">
            @foreach ($payment->proofs as $key => $proof)
                <div wire:key="{{ $key }}">
                    <x-button href="{{ Storage::url($proof->file_id) }}"
                        target="_blank"
                        icon="photograph" />
                </div>
            @endforeach
        </div>
        <div id="reference"
            class="pt-3">
            <h1>Reference no. : {{ $payment->reference_number }}</h1>
        </div>


        @if ($request_status == 'payment-to-review')
            <div class="mt-2">
                <form>
                    @csrf
                    <x-input label="Retrieval Date"
                        wire:model="retrieval_date"
                        type="date" />
                </form>
                <div class="flex mt-3 space-x-3">
                    <x-button info
                        sm
                        label="Approve"
                        wire:click="approvePayment" />
                    <x-button negative
                        sm
                        label="Deny" />
                </div>
            </div>
        @endif
    </div>
</div>
