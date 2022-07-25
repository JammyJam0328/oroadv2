<?php

namespace App\Http\Livewire\ViewRequest;

use Livewire\Component;
use App\Models\Payment;
use WireUi\Traits\Actions;
use App\Models\RequestDocument;
use App\Models\Request;

class PaymentProcess extends Component
{
    use Actions;
    public $request_id;
    public $request_status;
    public $additional_charges;
    protected $listeners = ['refreshPaymentDetails'=>'$refresh'];
    public function render()
    {
        return view('livewire.view-request.payment-process',[
            'payment'=>Payment::where('request_id',$this->request_id)->first()
        ]);
    }

    public function addCharge()
    {
        $payment = Payment::where('request_id', $this->request_id)->first();
        $payment->update([
            'additional_charges'=> $this->additional_charges,
        ]);
        $this->additional_charges = '';
    }

    public function  approveRequest()
    {
        $request_documents = RequestDocument::where('request_id', $this->request_id)->get();
        foreach ($request_documents as $request_document) {
            if ($request_document->docx_status == 'pending') {
                $this->notification([
                    'title'=>'Error',
                    'description'=>'Please approve or deny all documents',
                    'icon'=>'error',
                ]);
                return;
            }
        }
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Do you want to approve this request?',
            'acceptLabel' => 'Yes, approve it',
            'method'      => 'approvedRequestConfirm',
        ]);
    }

    public function approvedRequestConfirm()
    {
        $request = Request::where('id', $this->request_id)->first();
        $request->update([
            'status'=>'approved',
        ]);
        $payment = Payment::where('request_id', $this->request_id)->first();
        $payment->update([
            'total_amount_to_pay'=>$payment->total_document_amount + $payment->additional_charges,
        ]);
        session()->flash('message', 'Request has been approved');
        return redirect()->route('registrar.v2-requests');
    }

    public function denyRequest()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Do you want to deny this request?',
            'acceptLabel' => 'Yes, deny it',
            'method'      => 'denyRequestConfirm',
        ]);
    }

    public function denyRequestConfirm()
    {
        $request = Request::where('id', $this->request_id)->first();
        $request->update([
            'status'=>'denied',
        ]);
        session()->flash('message', 'Request has been denied');
        return redirect()->route('registrar.v2-requests');

    }
}