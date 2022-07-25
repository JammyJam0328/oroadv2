<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class RegistrarNavNotificationIcon extends Component
{
    protected $listeners = ['refreshIcon'=>'$refresh'];
    public function render()
    {
        return view('livewire.components.registrar-nav-notification-icon',[
            'notifications_count'=>auth()->user()->unreadNotifications->count(),
        ]);
    }
}