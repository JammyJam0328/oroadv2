<?php

namespace App\Http\Livewire\Pages\Registrar;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Document;
use App\Models\CampusDocument;
use App\Models\RequestDocument;
use App\Models\Request;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Notifications\EmailNotificaiton;
class ViewRequest extends Component
{
    use Actions;
    public $request_id;
    public $action;
    public $readyToApprove=false;
    public $retrieval_date;

    public function mount($id, $action)
    {
        $this->request_id = $id;
        $this->action = $action;
        $this->retrieval_date = $this->request->retrieval_date;
    }
    public function getRequestProperty()
    {
        return Request::where('id', $this->request_id)->with(['user.information','payment'])->first();
    }
    public function render()
    {
        return view('livewire.pages.registrar.view-request')
        ->layout('layouts.registrar');
    }

    public function approvedRequest()
    {
        abort_if($this->request->status != "finalized", 404, 'Request status is already updated');
       $result_value = RequestDocument::where('request_id', $this->request->id)->where('docx_status', 'pending')->exists();
       if ($result_value==true) {
            $this->notification()->notify([
               'title' => 'Error',
                'description' => 'Please check all the documents (approved or deny)',
                'icon' => 'error',
           ]);
       }else{
           $this->readyToApprove = true;
            $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'You are about to approve this request',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes, approve it',
                    'method'=>'approvedRequestYesAction'
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                   
                ],
            ]);
       }
    }
    public function approvedRequestYesAction()
    {
        if ($this->readyToApprove==false) {
            $this->notification()->notify([
               'title' => 'Error',
                'description' => 'Something went wrong',
                'icon' => 'error',
           ]);
           return;
        }
        $this->request->update([
            'status' => 'approved',
        ]);
        $this->request->payment()->update([
            'total_amount_to_pay'=> $this->request->payment->total_document_amount + $this->request->payment->additional_charges,
        ]);
        $this->readyToApprove = false;
        $details = [
            'name' => $this->request->user->information->first_name.' '.$this->request->user->information->last_name,
            'message' => 'Request has been approved',
        ];
        $this->request->user->notify(new EmailNotificaiton($details));
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Request has been approved',
            'icon' => 'success',
         ]);
    }

    public function approvePayment()
    {
        $this->validate([
            'retrieval_date' => 'required|date',
        ]);
        abort_if($this->request->status != "payment-to-review", 404, 'Request status is already updated');
        $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'You are about to approve this payment ?',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes, approve it',
                    'method'=>'approvePaymentConfirm'
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                   
                ],
            ]);
    }

    public function approvePaymentConfirm()
    {
        $this->request->payment([
            'status' => 'paid',
        ]);
        $this->request->update([
            'status' => 'ready-to-claim',
        ]);
        $details = [
            'name' => $this->request->user->information->first_name.' '.$this->request->user->information->last_name,
            'message' => 'Your payment has been approved. Your request is now ready to claim',
        ];
        $this->request->user->notify(new EmailNotificaiton($details));
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Payment has been approved',
            'icon' => 'success',
         ]);
    }

    public function denyPayment()
    {
        abort_if($this->request->status != "payment-to-review", 404, 'Request status is already updated');
        $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'You are about to deny this payment ?',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes, deny it',
                    'method'=>'denyPaymentConfirm'
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                   
                ],
            ]);
    }

    public function denyPaymentConfirm()
    {
        $this->request->payment([
            'status' => 'denied',
        ]);
        $this->request->update([
            'status' => 'denied',
        ]);
        $details = [
            'name' => $this->request->user->information->first_name.' '.$this->request->user->information->last_name,
            'message' => 'Your payment has been denied',
        ];
        $this->request->user->notify(new EmailNotificaiton($details));
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Payment has been denied',
            'icon' => 'success',
        ]);
    }

    public function claimed()
    {
        abort_if($this->request->status != "ready-to-claim", 404, 'Request status is already updated');
        $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'You are about to mark as claim this request',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes, mark as claim',
                    'method'=>'claimedConfirm'
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                   
                ],
            ]);
    }

    public function claimedConfirm()
    {
        $this->request->update([
            'status' => 'claimed',
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Request has been claimed',
            'icon' => 'success',
         ]);
    }

    public function updatedRetrievalDate()
    {
        $this->validate([
            'retrieval_date' => 'required|date|after:today',
        ]);
        $this->request->update([
            'retrieval_date' => $this->retrieval_date,
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Retrieval date has been set',
            'icon' => 'success',
         ]);
    }

    public function denyRequest()
    {
        abort_if($this->request->status != "finalized", 404, 'Request status is already updated');
        $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'You are about to deny this request ?',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes, deny it',
                    'method'=>'denyRequestConfirm'
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                ],
        ]);
    }

    public function denyRequestConfirm()
    {
        $this->request->update([
            'status' => 'denied',
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Request has been denied',
            'icon' => 'success',
         ]);
    }
    public function forwardRequest()
    {
         $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'You are about to forward this request to ACCESS campus',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes',
                    'method'=>'forwardRequestConfirm'
                ],
                'reject' => [
                    'label'  => 'No',
                ],
        ]);
    }

    public function forwardRequestConfirm()
    {
        $this->request->update([
            'campus_id' => '1',
        ]);
        return redirect()->route('registrar.pending-request');
    }
    // public function forGraduateRequestHandler()
    // {
    //     if ($this->request->requestor_current_status == "graduated") {
    //         if (auth()->user()->campus_id == '1') {
    //            $this->notification()->notify([
    //                 'title' => 'Unauthorized Action',
    //                 'description' => 'You are not allowed to perform this action',
    //                 'icon' => 'error',
    //             ]);
    //         }
    //     }
    // }
}