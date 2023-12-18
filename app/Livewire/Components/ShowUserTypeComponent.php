<?php

namespace App\Livewire\Components;

use App\Models\User_type;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowUserTypeComponent extends Component
{
    public $search;

    public function render()
    {
        $user_type_data = User_type::where('name', 'LIKE' ,'%'.$this->search.'%')
                                   ->where('is_deleted' , 0)
                                   ->paginate(6);

        return view('livewire.components.show-user-type-component', compact('user_type_data'));
        // ->layout('layouts.none');
    }

    public function goToEdit($id)
    {
            Session::put('user_type_id' , $id);
            return $this->redirect('/Manage-User-Type/create' , navigate:true);
    }
}
