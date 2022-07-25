<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Document;
use App\Models\CampusDocument;
use App\Models\RequestDocument;
use App\Models\Request;
use App\Models\Payment;

use WireUi\Traits\Actions;
use Livewire\WithPagination;
class RequestDocuments extends Component
{
    use Actions;
    public $request_id;
    public $authAmount;
    public $reqest_document_id;
    public $number_of_pages;
    public $request_status;
    public $requestor_current_status;
    public function allowedActions()
    {
        if ($this->request_status=="finalized") {
            if ($this->requestor_current_status=="graduated" && auth()->user()->campus_id != '1') {
                return false;
            }
            return true;
        }
    }
    public function getRequestDocumentProperty()
    {
        return RequestDocument::where('id', $this->reqest_document_id)->with(['request'])->first();
    }

    public function render()
    {
        return view('livewire.components.request-documents',[
            'request_documents' => RequestDocument::where('request_id', $this->request_id)->with(['campusDocument.document'])->get(),
        ]);
    }
    // require for TOR 
    public function savePage($id)
    {
        $this->reqest_document_id = $id;
        abort_if($this->requestDocument->request->status != "finalized", 404, 'Request status is already updated');
        $this->validate([
            'number_of_pages' => 'required|numeric',
        ]);
        $this->requestDocument->update([
            'number_of_pages' => $this->number_of_pages,
        ]);
        $this->number_of_pages = '';
    }
    // different method for TOR ( action 1)
    public function approvedConfirmation($id)
    {
        $this->reqest_document_id = $id;
        abort_if($this->requestDocument->request->status != "finalized", 404, 'Request status is already updated');
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to approve this document? (Make sure the document is ready to be sent to the student)',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Approve',
                'method' => 'approvedRequest',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }
    // (action 2)
    public function approvedRequest()
    {
        // authentication pricing (can modifie)
        $this->authAmount = $this->requestDocument->withAuth == 1 ? 15 : 0;
        if ($this->requestDocument->campusDocument->document->id=='5') {
            $this->approveTOR();
        }else{
            $this->approvedNotTOR();
        }
    }
    // methods for non TOR documents (action 3 | 1 of 2)
     protected function approvedNotTOR()
    {
        $document_amount = ($this->requestDocument->campusDocument->document->price + $this->authAmount) * $this->requestDocument->copy;
        $this->requestDocument->update([
            'total_amount' => $document_amount,
            'docx_status' => 'approved',
        ]);
         $payment = Payment::where('request_id', $this->request_id)->first();
         $payment->update([
             'total_document_amount'=> $payment->total_document_amount + $document_amount,
         ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Document has been approved',
            'icon' => 'thumb-up',
        ]);    
        $this->emit('approvedDocx');
    }

    public function approveTOR()
    {
        if ($this->requestDocument->number_of_pages == 0) {
            $this->notification()->notify([
                'title' => 'Error',
                'description' => 'Please add the number of pages',
                'icon' => 'error',
            ]);
            return;
        }else{
                $document_amount = $this->getAmountTOR();
                $this->requestDocument->update([
                    'total_amount' => $document_amount,
                    'docx_status' => 'approved',
                ]);
                $payment = Payment::where('request_id', $this->request_id)->first();
                $payment->update([
                    'total_document_amount'=> $payment->total_document_amount + $document_amount,
                ]);
                $this->notification()->notify([
                    'title' => 'Success',
                    'description' => 'Document has been approved',
                    'icon' => 'success',
                ]);    
                $this->emit('approvedDocx');
            }
    }

    public function getAmountTOR()
    {
        $document_amount=0;
        $succeeding_page_count=0;
        $temp_amount=0;
        $this->authAmount = $this->requestDocument->withAuth == 1 ? 15 : 0;
        if ($this->requestDocument->number_of_pages > 1 && $this->requestDocument->number_of_pages != 0 ) {
            $succeeding_page_count = $this->requestDocument->number_of_pages - 1;
            $temp_amount = (50 + $this->authAmount) * $succeeding_page_count;
            $document_amount = $temp_amount + 75;
        }else{
            $document_amount = 75;
        }
        return $document_amount;
    }

    public function undoRequestDocumentStatus($id)
    {
        $this->reqest_document_id = $id;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to undo this document? (Request document will return to its pending status)',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Undo it',
                'method' => 'confirmUndo',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                
            ],
        ]);
    }

    public function confirmUndo()
    {
        abort_if($this->requestDocument->request->status != "finalized", 404, 'Request status is already updated');
        $this->requestDocument->update([
            'docx_status' => 'pending',
        ]);
        $payment = Payment::where('request_id', $this->request_id)->first();
        $payment->update([
            'total_document_amount'=> $payment->total_document_amount - $this->requestDocument->total_amount,
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Document status has been updated',
            'icon' => 'success',
        ]);
        $this->emit('undoRequestDocumentStatus');   
    }

    public function denyRequestDocument($id)
    {
        $this->reqest_document_id = $id;
        abort_if($this->requestDocument->request->status != "finalized", 404, 'Request status is already updated');
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Are you sure you want to deny this document? (Request document will return to its pending status)',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Deny it',
                'method' => 'confirmDeny',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                
            ],
        ]);
    }

    public function confirmDeny()
    {
        abort_if($this->requestDocument->request->status != "finalized", 404, 'Request status is already updated');
        $this->requestDocument->update([
            'docx_status' => 'denied',
        ]);
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Request document has been denied',
            'icon' => 'thumb-down',
        ]);
        $this->emit('denyRequestDocument');   
    }
}