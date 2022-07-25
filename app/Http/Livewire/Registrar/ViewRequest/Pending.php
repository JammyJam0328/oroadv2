<?php

namespace App\Http\Livewire\Registrar\ViewRequest;

use Livewire\Component;
use App\Models\Request;
use App\Models\RequestDocument;
use WireUi\Traits\Actions;
class Pending extends Component
{
    use Actions;
    public $request;
    public $authAmount;
    public $reqest_document_id;
    public $page;
    public function getRequestDocumentProperty()
    {
        return RequestDocument::where('id', $this->reqest_document_id)->first();
    }
    public function render()
    {
        return view('livewire.registrar.view-request.pending');
    }
    protected function approvedNotTOR()
    {
        $document_amount = ($this->requestDocument->campusDocument->document->price + $this->authAmount) * $this->requestDocument->copy;
         $this->requestDocument->update([
            'total_amount' => $document_amount,
            'docx_status' => 'approved',
         ]);
         $this->request->payment()->update([
             'total_document_amount'=> $this->request->payment->total_document_amount + $document_amount,
         ]);
    }

    public function approvedTOR()
    {

    }
    public function approvedRequest()
    {
        $this->authAmount = $this->requestDocument->withAuth == 1 ? 15 : 0;
        if ($this->requestDocument->campusDocument->document->id=='5') {
            return;
        }else{
            $this->approvedNotTOR();
        }
        $this->emitUp('approvedDocx');
        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Document has been approved',
            'icon' => 'success',
         ]);    
    }

    public function approvedConfirmation($id)
    {
        $this->reqest_document_id = $id;
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
                'method' => 'cancel',
            ],
        ]);
    }

    public function saveTorPage()
    {
        $this->validate([
            'page' => 'required|numeric',
        ]);
        $this->requestDocument->update([
            'number_of_pages' => $this->page,
        ]);
    }
    
}