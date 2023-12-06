<?php

namespace App\Livewire\ParentComponents;

use Livewire\Component;

class WeeklyTraineeListComponent extends Component
{
    public function render()
    {
        return view('livewire.parent-components.weekly-trainee-list-component')->layout('layouts.app');
    }
}
