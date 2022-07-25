<?php

namespace App\Http\Livewire\Requestor\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\CampusDocument;
use App\Models\Request;
use App\Models\RequestDocument;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
class RequestHistory extends Component
{
    public function render()
    {
        return view('livewire.requestor.home.request-history',[
            'requests'=>Request::where('user_id',auth()->user()->id)->with(['requestDocuments'])->withCount('requestDocuments')->latest()->paginate(10),
        ]);
    }
}