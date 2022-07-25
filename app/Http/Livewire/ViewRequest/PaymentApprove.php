<?php

namespace App\Http\Livewire\ViewRequest;

use Livewire\Component;
use App\Models\Proof;
use App\Models\Request;
use App\Models\Payment;
use WireUi\Traits\Actions;

class PaymentApprove extends Component
{
    use Actions;
    public $proofs=[];
    public $request_id;
    public $request_status;
    public $retrieval_date;
    public $payment;
    public function mount()
    {
        if ($this->request_status=="payment-to-review") {
            $this->payment = Payment::where('request_id',$this->request_id)->with(['proofs'])->first();
        }
    }
    public function render()
    {
        return view('livewire.view-request.payment-approve');
    }
    public function updatedRetrievalDate()
    {
        $today = date('Y-m-d');
        $this->validate([
            'retrieval_date' => 'required|date|after_or_equal:today',
        ]);
        $request = Request::where('id',$this->request_id)->first();
        $request->update([
            'retrieval_date' => $this->retrieval_date,
        ]);
        $this->notification([
            'title' => 'Success',
            'description' => 'Retrieval date has been updated',
            'icon' => 'success',
        ]);
    }
    public function approvePayment()
    {
        $this->validate([
            'retrieval_date' => 'required|date|after_or_equal:today',
        ]);
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to approve this payment. The request status will be set as Ready to claim.',
            'acceptLabel' => 'Yes, approve it',
            'method'      => 'approvePaymentConfirm',
        ]);
    }

    public function approvePaymentConfirm()
    {
        $request = Request::where('id',$this->request_id)->first();
        $request->update([
            'status' => 'ready-to-claim',
        ]);
        $this->payment->update([
            'status' => 'paid',
            'paid_at' => date('Y-m-d'),
        ]);

        session()->flash('message', 'Payment has been approved');
        return redirect()->route('registrar.v2-requests');
    }

    public function denyPayment()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to deny this payment.',
            'acceptLabel' => 'Yes, deny it',
            'method'      => 'denyPaymentConfirm',
        ]);
    }

    public function denyPaymentConfirm()
    {
        $request = Request::where('id',$this->request_id)->first();
        $request->update([
            'status' => 'denied',
        ]);
        $this->payment->update([
            'status' => 'denied',
        ]);

        session()->flash('message', 'Payment has been denied');
        return redirect()->route('registrar.v2-requests');
    }
}