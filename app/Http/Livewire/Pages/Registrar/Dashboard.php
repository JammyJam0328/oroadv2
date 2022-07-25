<?php

namespace App\Http\Livewire\Pages\Registrar;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.registrar.dashboard')
        ->layout('layouts.registrar');
    }
}