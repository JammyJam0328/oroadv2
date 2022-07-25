<?php

namespace App\Http\Livewire\Pages\Registrar;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class ManageUsers extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.pages.registrar.manage-users',[
            'users'=>User::paginate(10),
        ])
            ->layout('layouts.registrar');
    }
}