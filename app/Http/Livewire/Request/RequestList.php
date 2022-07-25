<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use App\Models\Request;
use Livewire\WithPagination;
class RequestList extends Component
{
    use WithPagination;
    public $search='';
    public $request_from='';
    public $request_status='';
    public function render()
    {
        return view('livewire.request.request-list',[
            'requests'=>Request::where('request_code','like','%'.$this->search.'%')
                                ->where('requestor_current_status','like','%'.$this->request_from.'%')
                                ->withCount('requestDocuments')
                                ->latest()->paginate(10)
        ]);
    }
    public function newSearch($search)
    {
        $this->search=$search;
    }
    public function view($id)
    {
        return redirect()->route('registrar.v2-request.view',['id'=>$id]);
    }
}