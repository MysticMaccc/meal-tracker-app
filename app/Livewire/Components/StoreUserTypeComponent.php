<?php

namespace App\Livewire\Components;

use App\Models\User_type;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class StoreUserTypeComponent extends Component
{
    public $user_type;
    public $user_type_data;
    protected $rules = [
        'user_type' => 'required|min:5|max:50'
    ];

    public function mount()
    {
            if(Session::get('user_type_id')){
                    $this->user_type_data = User_type::find(Session::get('user_type_id'));
                    $this->user_type = $this->user_type_data->name;
            }
    }

    public function render()
    {
        return view('livewire.components.store-user-type-component');
        // ->layout('layouts.none');
    }

    public function create()
    {
        try 
        {
            $this->validate();
            $create_user_type = User_type::create([
                'name' => $this->user_type
            ]);

            if(!$create_user_type){
                session()->flash('error', 'error: User type cannot be created!');
            }

                session()->flash('success', 'User type created successfully!');
                return $this->redirect('/Manage-User-Type/index' , navigate:true);
        } 
        catch (\Exception $e) 
        {
            session()->flash('error', 'error: '.$e->getMessage());
        }
    }

    public function update()
    {
        try 
        {
            $this->validate();
            $update_user_type = $this->user_type_data->update([
                'name' => $this->user_type
            ]);

            if(!$update_user_type){
                session()->flash('error', 'error: User type cannot be updated!');
            }

                session()->flash('success', 'User type updated successfully!');
                return $this->redirect('/Manage-User-Type/index' , navigate:true);
        } 
        catch (\Exception $e) 
        {
            session()->flash('error', 'error: '.$e->getMessage());
        }
    }

    public function goBack()
    {
        Session::forget('user_type_id');
        return $this->redirect('/Manage-User-Type/index' , navigate:true);
    }
}
