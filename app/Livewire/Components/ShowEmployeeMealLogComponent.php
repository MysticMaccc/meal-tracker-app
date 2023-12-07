<?php

namespace App\Livewire\Components;

use App\Models\Employee_meal_log;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployeeMealLogComponent extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = ['refreshShowComponent'];

    public function render()
    {
        $employee_meal_log_data = Employee_meal_log::where('date_scanned' , 'LIKE' , '%'.$this->search.'%')
                                                   ->orWhere('time_scanned' , 'LIKE' , '%'.$this->search.'%')
                                                   ->orWherehas('barcode' , function($query){
                                                            $query->where('card_number' , 'LIKE' , '%'.$this->search.'%')
                                                                  ->orWhere('owner' , 'LIKE' , '%'.$this->search.'%')
                                                                  ->orWhere('company' , 'LIKE' , '%'.$this->search.'%');
                                                   })
                                                   ->orderBy('id','desc')
                                                   ->paginate(6);
                                             
        return view('livewire.components.show-employee-meal-log-component' , [
            'employee_meal_log_data' => $employee_meal_log_data
        ]);
        // ->layout('layouts.none');
    }

    public function refreshShowComponent()
    {
        $this->render();
    }
}
