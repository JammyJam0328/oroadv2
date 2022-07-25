<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
class RegistrarNotifications extends Component
{
    use WithPagination;
    public $take=10;
    public function render()
    {
        return view('livewire.components.registrar-notifications',[
            'notifications'=>auth()->user()->notifications->take($this->take),
        ]);
    }
    public function markAsRead($id)
    {
        auth()->user()->unreadNotifications->where('id',$id)->first()->markAsRead();
        $this->refreshIcon();
       
    }

    public function markAsUnread($id)
    {
        auth()->user()->notifications->where('id',$id)->first()->markAsUnread();
        $this->refreshIcon();
    }

    public function refreshIcon()
    {
        $this->emit('refreshIcon');
    }
}