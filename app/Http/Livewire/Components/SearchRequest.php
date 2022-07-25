<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Document;
use App\Models\CampusDocument;
use App\Models\RequestDocument;
use App\Models\Request;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
class SearchRequest extends Component
{
    use Actions;
    public $searchTerm='';
    public function render()
    {
        return view('livewire.components.search-request',[
            'searchResults'=> $this->searchTerm ? Information::search($this->searchTerm)->get() : [],
        ]);
    }

    public function setNewRequestCollection($id)
    {
        $this->emitUp('setNewRequestCollection',$id);
        $this->dispatchBrowserEvent('close-search-panel');
    }
}