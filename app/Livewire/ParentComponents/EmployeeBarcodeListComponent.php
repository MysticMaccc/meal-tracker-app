<?php

namespace App\Livewire\ParentComponents;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class EmployeeBarcodeListComponent extends Component
{
    use AuthorizesRequests;

    public function mount()
    {
        Gate::authorize('authorizeEmployeeList');
    }

    public function render()
    {
        return view('livewire.parent-components.employee-barcode-list-component')->layout('layouts.app');
    }
}
