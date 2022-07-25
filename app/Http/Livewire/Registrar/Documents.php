<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;

class Documents extends Component
{
    public function render()
    {
        return view('livewire.registrar.documents')
        ->layout('layouts.registrar');
    }
}