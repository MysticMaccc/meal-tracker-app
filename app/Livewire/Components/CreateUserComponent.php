<?php

namespace App\Livewire\Components;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUserComponent extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.components.create-user-component');
        // ->layout('layouts.none');
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

            try 
            {
              $create = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
              ]);

              if(!$create){
                session()->flash('error' , 'Cannot create user!');
              }
                session()->flash('success' , 'User created successfully!');
                $this->reset();
            } 
            catch (\Exception $e) 
            {
                session()->flash('error' , 'error :'.$e->getMessage());
            }

    }
}
