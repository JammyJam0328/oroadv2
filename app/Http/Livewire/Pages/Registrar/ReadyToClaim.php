<?php

namespace App\Http\Livewire\Pages\Registrar;

use Livewire\Component;
use App\Models\Request;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
class ReadyToClaim extends Component
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
        return view('livewire.pages.registrar.ready-to-claim',[
            'requests'=>Request::where('status','ready-to-claim')
                                ->where('request_code', 'like', '%'.$this->search_request_code.'%')
                                ->where('user_id','like','%'.$this->search_id.'%')
                                ->where('campus_id',auth()->user()->campus_id)
                                ->with('user.information')
                                ->with('payment')
                                ->paginate(10),
        ])->layout('layouts.registrar');
    }

    public function viewDetails($id)
    {
        return redirect()->route('registrar.request.details',['id'=>$id,'action'=>'ready-to-claim']);
    }
}