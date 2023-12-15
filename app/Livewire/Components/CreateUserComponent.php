<?php

namespace App\Livewire\Components;

use App\Models\User;
use App\Models\User_type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreateUserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $user_type_id;
    public $user_id;
    public $checkbox = true;
    public $user_type_data;
    public $get_user_data;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'user_type_id' => 'required'
    ];
    
    public function mount()
    {
        $this->user_type_data = User_type::where('is_deleted', 0)->get();

        if (Session::get('user_id')) 
        {
            $this->user_id = Session::get('user_id');
            $this->get_user_data = User::find($this->user_id);
            $this->checkbox = false;
    
            if (!$this->get_user_data) {
                session()->flash('error', 'User data does not exist!');
            }
            
            $this->name = $this->get_user_data->name;
            $this->email = $this->get_user_data->email;
            
        }
    }
    public function render()
    {
        return view('livewire.components.create-user-component');
        // ->layout('layouts.none');
    }

    public function Checkbox()
    {
        $this->checkbox = $this->checkbox;
    }

    public function generatePassword()
    {
        $length = 12;
        $uppercase = true;
        $lowercase = true;
        $numbers = true;
        $symbols = true;

        $characters = '';
        $characters .= $uppercase ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
        $characters .= $lowercase ? 'abcdefghijklmnopqrstuvwxyz' : '';
        $characters .= $numbers ? '0123456789' : '';
        $characters .= $symbols ? '@#$%^&*]+$' : '';

        $password = '';
        $characterSetLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $characterSetLength - 1)];
        }

        $this->password = $password;
    }

    public function create()
    {
            $this->validate();

            try {
                $create = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'user_type_id' => $this->user_type_id
                ]);
    
                if (!$create) {
                    session()->flash('error', 'Cannot create user!');
                }
                session()->flash('success', 'User created successfully!');
                return $this->redirect('/Manage-User/index', navigate: true);
            } catch (\Exception $e) {
                session()->flash('error', 'error :' . $e->getMessage());
            }
    }

    public function update()
    {
        try {
            $user_data = User::find($this->user_id);

            if(!$this->checkbox){
                $this->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email',
                    'user_type_id' => 'required'
                ]);

                $update_user = $user_data->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'user_type_id' => $this->user_type_id
                ]);
            }else{
                $this->validate();

                $update_user = $user_data->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'user_type_id' => $this->user_type_id
                ]);
            }
                
            if (!$update_user) {
                session()->flash('error', 'Cannot update user!');
            }
            session()->flash('success', 'User updated successfully!');
            return $this->redirect('/Manage-User/index', navigate: true);
            
        } catch (\Exception $e) {
            session()->flash('error', 'error :' . $e->getMessage());
        }
    }
    
}
