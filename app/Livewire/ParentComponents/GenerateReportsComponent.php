<?php

namespace App\Livewire\ParentComponents;

use App\Livewire\GenerateDocumentsComponent\EmployeeMealTrackerGenerateReport;
use Livewire\Component;
use App\Models\Trainee_meal_log;
use App\Models\Employee_meal_log;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GenerateReportsComponent extends Component
{
    use AuthorizesRequests;
    public $datefrom = null;
    public $dateto= null;

    protected $rules = [
        'datefrom' => 'required',
        'dateto' => 'required|date|after:datefrom'
    ];

    public function mount()
    {
        Gate::authorize('authorizeReport');
    }

    public function generatePDFEMT()
    {
        $this->validate();
        $employee_meal_log_data = Employee_meal_log::where('date_scanned' , '>=' , $this->datefrom)
                                                   ->where('date_scanned' , '<=' , $this->dateto)
                                                   ->orderBy('id','desc')->get();

        $date_range = date('F d, Y', strtotime($this->datefrom)).' - '.date('F d, Y', strtotime($this->dateto));
        return Excel::download(new EmployeeMealTrackerGenerateReport($employee_meal_log_data), 
        'Employee_Meal_Log_from_'.$date_range.'.xlsx');
        
    }
    
    public function render()
    {
        return view('livewire.parent-components.generate-reports-component')->layout('layouts.app');
    }

}
