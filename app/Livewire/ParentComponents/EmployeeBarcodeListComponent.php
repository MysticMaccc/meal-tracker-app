<?php

namespace App\Livewire\ParentComponents;

use Livewire\Component;

class EmployeeBarcodeListComponent extends Component
{
    public function render()
    {
        return view('livewire.parent-components.employee-barcode-list-component')->layout('layouts.app');
    }
}
