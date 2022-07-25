<?php

namespace App\Http\Livewire\ViewRequest;

use Livewire\Component;
use App\Models\{RequestDocument,Request,Payment};
use WireUi\Traits\Actions;
class RequestedDocuments extends Component
{
    use Actions;
    public $request_id,$request_status,$is_graduated,$allowed_to_approved,$is_access_campus;
    public function mount()
    {
        $this->is_access_campus = auth()->user()->campus_id == 1 ? true : false;
        if ($this->is_graduated) {
            $this->allowed_to_approved = $this->is_access_campus ? true : false;
        }else{
            $this->allowed_to_approved = true;
        }
    }
    public function isTOR($id)
    {
        return $id == 5;
    }
    public function render()
    {
        return view('livewire.view-request.requested-documents',[
            'request_documents'=>RequestDocument::where('request_id',$this->request_id)->with(['campusDocument.document'])->get(),
            'payment'=>Payment::where('request_id',$this->request_id)->first(),
        ]);
    }

    public function approveDocument($id,$document_id)
    {
        $request_document = RequestDocument::where('id',$id)->first();
        if ($this->isTOR($request_document->campus_document_id)) {
            $this->approveTOR($request_document);
        }else{
            $this->approveNotTor($request_document);
        }
    }
    public function setPage($page,$campus_document)
    {
        $request_document = RequestDocument::where('id',$campus_document)->first();
        $request_document->update([
            'number_of_pages' => $page,
        ]);
        $this->notification([
            'title' => 'Success',
            'description' => 'Number of pages has been updated',
            'icon' => 'success',
        ]);
    }

    // Approve document handlers
    protected function approveNotTor($request_document)
    {
        $authAmount = $request_document->withAuth == 1 ? 15 : 0;
        $document_amount = ( $request_document->campusDocument->document->price + $authAmount) *  $request_document->copy;
        $request_document->update([
            'total_amount' => $document_amount,
            'docx_status' => 'approved',
        ]);
        $payment = Payment::where('request_id', $this->request_id)->first();
        $payment->update([
            'total_document_amount'=> $payment->total_document_amount + $document_amount,
        ]);
        $this->emit('refreshPaymentDetails');

    }
    
    protected function approveTOR($request_document)
    {
        if ($request_document->number_of_pages == 0) {
            $this->notification([
                'title' => 'Error',
                'description' => 'Please add the number of pages',
                'icon' => 'error',
            ]);
            return;
        }
        $document_amount=0;
        $succeeding_page_count=0;
        $temp_amount=0;
        $authAmount = $request_document->withAuth == 1 ? 15 : 0;
        if ($request_document->number_of_pages > 1 && $request_document->number_of_pages != 0 ) {
            $succeeding_page_count = $request_document->number_of_pages - 1;
            $temp_amount = 50  * $succeeding_page_count;
            $document_amount = $temp_amount + 75 + $authAmount;
        }else{
            $document_amount = 75;
        }
        $request_document->update([
            'total_amount' => $document_amount * $request_document->copy,
            'docx_status' => 'approved',
        ]);
        $payment = Payment::where('request_id', $this->request_id)->first();
        $payment->update([
            'total_document_amount'=> $payment->total_document_amount + $document_amount,
        ]);
        $this->emit('refreshPaymentDetails');
    }
    // end approve document handlers
    // ---->
    // Undo document actions handler
    public function undoAction($id)
    {
        $request_document = RequestDocument::where('id',$id)->first();
        $payment = Payment::where('request_id', $this->request_id)->first();
        $payment->update([
            'total_document_amount'=> $payment->total_document_amount - $request_document->total_amount,
        ]);
        $request_document->update([
            'total_amount' => 0,
            'docx_status' => 'pending',
        ]);
        $this->emit('refreshPaymentDetails');
    }
    // end undo document actions handler
    // ---->
    //Deny document handlers
    public function denyDocument($id)
    {
        $request_document = RequestDocument::where('id',$id)->first();
        $request_document->update([
            'docx_status' => 'denied',
        ]);
    }
    // public function denyDocument($id)
    // {
    //     $request_document = RequestDocument::where('id',$id)->first();
    //     $request_document->update([
    //         'docx_status' => 'denied',
    //     ]);
    // }
}