<?php

namespace App\Livewire\ParentComponents;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ManageUserComponent extends Component
{
    use AuthorizesRequests;

    public function mount()
    {
        Gate::authorize('authorizeSettings');
    }

    public function render()
    {
        return view('livewire.parent-components.manage-user-component')->layout('layouts.app');
    }

    public function clear_Sessions()
    {
        Session::forget('user_id');
        Session::put('user_form_title' , 'Create User');
        return $this->redirect('/Manage-User/create', navigate:true);
    }
}
