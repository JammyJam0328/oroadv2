<?php

namespace App\Http\Livewire\Components\Registrar;

use Livewire\Component;

class NotificationList extends Component
{
    public $intersected = false;
    public function render()
    {
        return view('livewire.components.registrar.notification-list',[
            'notifications' => $this->intersected ? auth()->user()->notifications : [],
        ]);
    }
}