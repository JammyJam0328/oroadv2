<?php

namespace App\Http\Livewire\Pages\Registrar;

use Livewire\Component;

class Reports extends Component
{
    public function render()
    {
        return view('livewire.pages.registrar.reports')
        ->layout('layouts.registrar');
    }
}