<?php

namespace App\Livewire\ParentComponents;

use Livewire\Component;

class CreateEmployeeBarcodeComponent extends Component
{
    public function render()
    {
        return view('livewire.parent-components.create-employee-barcode-component')->layout('layouts.app');
    }
}
