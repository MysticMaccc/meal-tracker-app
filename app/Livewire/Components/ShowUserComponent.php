<?php

namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $user_data = User::orderBy('name' , 'asc')->paginate(6);

        return view('livewire.components.show-user-component' , 
        compact('user_data'));
        // ->layout('layouts.none');
    }
}
