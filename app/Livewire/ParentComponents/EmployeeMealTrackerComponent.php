<?php

namespace App\Livewire\ParentComponents;

use Livewire\Component;

class EmployeeMealTrackerComponent extends Component
{
    protected $listeners = ['mealLogUpdated' => 'refreshShowComponent'];
    public $autofocus = "autofocus";

    public function render()
    {
        return view('livewire.parent-components.employee-meal-tracker-component')->layout('layouts.app');
    }

    public function refreshShowComponent()
    {
        $this->dispatch('refreshShowComponent');
    }
}
