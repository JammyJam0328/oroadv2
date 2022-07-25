<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Document;
use App\Models\CampusDocument;


use WireUi\Traits\Actions;
class Home extends Component
{
    use Actions;
    public $requestDocument = false;
    protected $listeners = ['cancelRequest'];
    public function cancelRequest()
    {
        $this->requestDocument = false;
    }
    public function render()
    {
        return view('livewire.requestor.home')
        ->layout('layouts.requestor');
    }

    public function clickRequestDocumentHandler()
    {
        // chech if user has information
        $user = auth()->user();
        $information = Information::where('user_id', $user->id)->first();
        if(!$information){
            $this->notification()->notify([
                'title' => 'Fail',
                'description' => 'You have not submitted your information yet',
                'icon' => 'error',
            ]);
            $this->dispatchBrowserEvent('no-information');
            return;
        }
    }
}