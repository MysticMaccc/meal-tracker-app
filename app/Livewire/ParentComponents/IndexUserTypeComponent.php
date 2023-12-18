<?php

namespace App\Livewire\ParentComponents;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class IndexUserTypeComponent extends Component
{
    public function render()
    {
        return view('livewire.parent-components.index-user-type-component')->layout('layouts.app');
    }

    public function goToCreate()
    {
        Session::forget('user_type_id');
        return $this->redirect('/Manage-User-Type/create' , navigate:true);
    }
}
