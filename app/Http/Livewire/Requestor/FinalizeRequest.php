<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Request;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class FinalizeRequest extends Component
{
    public $request_id;
    protected $listeners = ['requestFinalized'=>'$refresh'];
    public function getRequestProperty()
    {
        return Request::where('id', $this->request_id)
                        ->first();
    }
    public function mount($id)
    {
        $this->request_id = $id;
        $request = Request::where('id', $this->request_id)->first();
        if(!$request){
           abort(404);
        }
    }
    public function render()
    {
        return view('livewire.requestor.finalize-request')
        ->layout('layouts.requestor');
    }
}