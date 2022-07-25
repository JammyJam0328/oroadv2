<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Payment;
use App\Models\Remark;  
use WireUi\Traits\Actions;

class RequestPaymentDetails extends Component
{
    use Actions;
    public $request_id;
    public $additional_charge;
    public $remarks;
    public $payment;
    public $requestor_current_status;
    public $request_status;
    protected $listeners = [
        'approvedDocx' => '$refresh',
        'undoRequestDocumentStatus' => '$refresh',
    ];
      public function allowedActions()
    {
        if ($this->request_status=="finalized") {
            if ($this->requestor_current_status=="graduated" && auth()->user()->campus_id != '1') {
                return false;
            }
            return true;
        }
    }
    public function checkIfRequestIsPending()
    {
        if ( $this->payment->request->status != 'finalized') {
            $this->notification()->notify([
                'title' => 'Error',
                'description' => 'Request is not pending',
                'icon' => 'error',
            ]);
            return;
        }
    }
    public function render()
    {
        $this->payment = Payment::where('request_id', $this->request_id)->with('request.remarks')->first();
        return view('livewire.components.request-payment-details');
    }

    public function updateAdditionalCharge()
    {
        if ($this->requestor_current_status == "graduated" && auth()->user()->campus_id != '1') {
           $this->notification()->notify([
                'title' => 'Unauthorized Action',
                'description' => 'You are not authorized to update the additional charge',
                'icon' => 'error',
            ]);
            return;
        }
        $this->checkIfRequestIsPending();
        $this->validate([
            'additional_charge'=>'required|numeric',
        ]);
        $this->payment->update([
            'additional_charges' => $this->additional_charge,
        ]);
        $this->additional_charge = '';
    }

    public function submitRemarks()
    {
         $this->checkIfRequestIsPending();
        $this->validate([
            'remarks'=>'required',
        ]);
        Remark::create([
            'request_id' => $this->request_id,
            'message' => $this->remarks,
        ]);
        $this->remarks = '';
    }
}