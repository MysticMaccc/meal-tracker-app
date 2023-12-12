<?php

namespace App\Livewire\ParentComponents;

use Livewire\Component;

class ManageUserComponent extends Component
{
    public $component = 'show';

    public function render()
    {
        return view('livewire.parent-components.manage-user-component')->layout('layouts.app');
    }

    public function goToCreate()
    {
        $this->component = 'create';
    }
}
