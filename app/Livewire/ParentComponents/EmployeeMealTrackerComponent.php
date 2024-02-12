<?php

namespace App\Livewire\ParentComponents;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class EmployeeMealTrackerComponent extends Component
{
    use AuthorizesRequests;
    protected $listeners = ['mealLogUpdated' => 'refreshShowComponent'];
    public $autofocus = "autofocus";

    public function mount()
    {
        Gate::authorize('authorizeMealTracker');
    }

    public function render()
    {
        return view('livewire.parent-components.employee-meal-tracker-component')->layout('layouts.app');
    }

    public function refreshShowComponent()
    {
        $this->dispatch('refreshShowComponent');
    }
}
