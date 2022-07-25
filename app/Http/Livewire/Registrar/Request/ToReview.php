<?php

namespace App\Http\Livewire\Registrar\Request;

use Livewire\Component;

class ToReview extends Component
{
    public function render()
    {
        return view('livewire.registrar.request.to-review')
        ->layout('layouts.registrar');
    }
}