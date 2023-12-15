<?php

namespace App\Livewire\ParentComponents;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class UserRegistrationComponent extends Component
{
    
    public function render()
    {
        $h1 = Session::get('user_form_title');
        
        return view('livewire.parent-components.user-registration-component' , compact('h1'))->layout('layouts.app');
    }
}
