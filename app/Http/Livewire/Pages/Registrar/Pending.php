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
class Pending extends Component
{
    use Actions, WithPagination;
    public $search_id;
    public $search_request_code="";

    protected $listeners = ['setNewRequestCollection'];
    public function setNewRequestCollection($id)
    {
        $this->search_id = $id;
    }
    public function render()
    {
        return view('livewire.pages.registrar.pending',[
            'requests'=>Request::where('status','finalized')
                                 ->where('request_code', 'like', '%'.$this->search_request_code.'%')
                                ->where('user_id','like','%'.$this->search_id.'%')
                                ->where('campus_id',auth()->user()->campus_id)
                                ->with('user.information')
                                ->with('payment')
                                ->paginate(10),
        ])
        ->layout('layouts.registrar');
    }

    public function viewDetails($id)
    {
        return redirect()->route('registrar.request.details',['id'=>$id,'action'=>'pending']);
    }
}