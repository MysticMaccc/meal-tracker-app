<?php

namespace App\Livewire\Components;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserComponent extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $user_data = User::where('name', 'LIKE', '%'.$this->search.'%')
                         ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                         ->orWhereHas('user_type', function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                         })
                         ->orderBy('name' , 'asc')->paginate(6);

        return view('livewire.components.show-user-component' , 
        compact('user_data'));
        // ->layout('layouts.none');
    }

    public function goToEdit($user_id)
    {
        Session::put('user_id', $user_id);
        Session::put('user_form_title', "Edit User");
        return $this->redirect('/Manage-User/create', navigate:true);
    }
}
