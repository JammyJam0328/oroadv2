<?php

namespace App\Http\Livewire\Requestor\FinalizeRequest;

use Livewire\Component;

class RequestItem extends Component
{
    public $request_document;

    public $copies;
    public $withAuth;
    public function mount()
    {
        $this->copies = $this->request_document->copy;
        $this->withAuth = $this->request_document->withAuth;
    }
    public function render()
    {
        return view('livewire.requestor.finalize-request.request-item');
    }

    public function updatedCopies()
    {
        $this->validate([
            'copies' => 'required|numeric|in:1,2,3,4,5,6,7,8,9,10',
        ]);
        $this->request_document->copy=$this->copies;
        $this->request_document->save();
    }

    public function updatedWithAuth()
    {
        $this->validate([
            'withAuth'=>'in:0,1',
        ]);
        $this->request_document->withAuth=$this->withAuth;
        $this->request_document->save();
    }
}