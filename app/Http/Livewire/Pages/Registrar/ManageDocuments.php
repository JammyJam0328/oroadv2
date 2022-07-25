<?php

namespace App\Http\Livewire\Pages\Registrar;

use Livewire\Component;
use App\Models\CampusDocument;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ManageDocuments extends Component
{
    use WithPagination, Actions;
    public $set_id;
    public function render()
    {
        return view('livewire.pages.registrar.manage-documents',[
            'documents' => CampusDocument::where('campus_id',auth()->user()->campus_id)->paginate(10)
        ])
        ->layout('layouts.registrar');
    }

    public function getCampusDocumentProperty()
    {
       return CampusDocument::where('id',$this->set_id)->first();
    }
    public function markAsAvailable($id)
    {
      $this->set_id=$id;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to mark this document as available',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes',
                'method'=>'markAsAvailableConfirm'
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function markAsAvailableConfirm()
    {
        $this->campusDocument->update([
            'status' => 'Available'
        ]);

        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Document has been marked as available',
            'icon' => 'success',
        ]);
    }

    public function markAsUnavailable($id)
    {
        $this->set_id=$id;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You are about to mark this document as unavailable',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes',
                'method'=>'markAsUnavailableConfirm'
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function markAsUnavailableConfirm()
    {
        $this->campusDocument->update([
            'status' => 'Unavailable'
        ]);

        $this->notification()->notify([
            'title' => 'Success',
            'description' => 'Document has been marked as unavailable',
            'icon' => 'success',
        ]);
    }
}