<?php

namespace App\Livewire\ParentComponents;

use App\Livewire\GenerateDocumentsComponent\EmployeeMealTrackerGenerateReport;
use App\Models\Category;
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
    public $dateto = null;
    public $categories, $employee_category;

    protected $rules = [
        'datefrom' => 'required',
        'dateto' => 'required|date|after:datefrom',
        'employee_category' => 'required'
    ];

    public function mount()
    {
        Gate::authorize('authorizeReport');
        $this->categories = Category::where('is_deleted', 0)->orderBy('name', 'ASC')->get();
    }

    public function generatePDFEMT()
    {
        $this->validate();
        $employee_meal_log_data = Employee_meal_log::whereHas('barcode', function ($query) {
            $query->where('category_id', $this->employee_category);
        })
            ->with('barcode')
            ->where('date_scanned', '>=', $this->datefrom)
            ->where('date_scanned', '<=', $this->dateto)
            ->get()
            ->sortBy('barcode.owner')
            ->values();

        $date_range = date('F d, Y', strtotime($this->datefrom)) . ' - ' . date('F d, Y', strtotime($this->dateto));
        $categoryName = Category::find($this->employee_category)->name ?? 'Unknown';
        
        return Excel::download(
            new EmployeeMealTrackerGenerateReport($employee_meal_log_data, $this->datefrom, $this->dateto, $categoryName),
            'Employee_Meal_Log_from_' . $date_range . '.xlsx'
        );
    }

    public function render()
    {
        return view('livewire.parent-components.generate-reports-component')->layout('layouts.app');
    }
}
