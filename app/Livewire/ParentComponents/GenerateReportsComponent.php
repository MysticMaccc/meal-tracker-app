<?php

namespace App\Livewire\ParentComponents;

use App\Models\Employee_meal_log;
use Livewire\Component;

class GenerateReportsComponent extends Component
{

    public $datefrom = null;
    public $dateto= null;

    protected $rules = [
        'datefrom' => 'required',
        'dateto' => 'required|date|after:datefrom'
    ];

    public function generatePDFEMT()
    {
        $this->validate();
        $employee_meal_log_data = Employee_meal_log::where('date_scanned' , '>=' , $this->datefrom)
                                                   ->where('date_scanned' , '<=' , $this->dateto)
                                                   ->orderBy('id','desc')->get();

        // dd($employee_meal_log_data);
        session(['meal_log' => $employee_meal_log_data]);
        session(['daterange' => date('F d, Y', strtotime($this->datefrom)).' - '.date('F d, Y', strtotime($this->dateto)) ]);
        return redirect()->route('Emp-Meal-Tracker.generateReport');
        
    }

    public function render()
    {
        return view('livewire.parent-components.generate-reports-component')->layout('layouts.app');
    }
}
