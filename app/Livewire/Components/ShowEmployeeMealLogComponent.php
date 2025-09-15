<?php

namespace App\Livewire\Components;

use App\Models\Employee_meal_log;
use App\Models\Meal_type;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployeeMealLogComponent extends Component
{
    use WithPagination;
    public $search = '';
    public $mealTypeFilter = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $timeFrom = '';
    public $timeTo = '';
    protected $listeners = ['refreshShowComponent'];

    public function mount()
    {
        // Set default date range to today
        $this->dateFrom = date('Y-m-d');
        $this->dateTo = date('Y-m-d');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedMealTypeFilter()
    {
        $this->resetPage();
    }

    public function updatedDateFrom()
    {
        $this->resetPage();
    }

    public function updatedDateTo()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->mealTypeFilter = '';
        $this->dateFrom = date('Y-m-d');
        $this->dateTo = date('Y-m-d');
        $this->timeFrom = '';
        $this->timeTo = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = Employee_meal_log::query();

        // Search filter
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('date_scanned', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('time_scanned', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('barcode', function ($barcodeQuery) {
                        $barcodeQuery->where('card_number', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('owner', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('company', 'LIKE', '%' . $this->search . '%');
                    })
                    ->orWhereHas('meal_type', function ($mealQuery) {
                        $mealQuery->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }

        // Meal type filter
        if (!empty($this->mealTypeFilter)) {
            $query->where('meal_type_id', $this->mealTypeFilter);
        }

        // Company filter
        if (!empty($this->companyFilter)) {
            $query->whereHas('barcode', function ($barcodeQuery) {
                $barcodeQuery->where('company', 'LIKE', '%' . $this->companyFilter . '%');
            });
        }

        // Date range filter
        if (!empty($this->dateFrom)) {
            $query->where('date_scanned', '>=', $this->dateFrom);
        }
        if (!empty($this->dateTo)) {
            $query->where('date_scanned', '<=', $this->dateTo);
        }

        $employee_meal_log_data = $query->orderBy('id', 'desc')->paginate(10);

        // Get meal types for filter dropdown
        $meal_types = Meal_type::all();

        // Get unique companies for filter dropdown
        $companies = Employee_meal_log::whereHas('barcode')
            ->with('barcode')
            ->get()
            ->pluck('barcode.company')
            ->unique()
            ->filter()
            ->sort()
            ->values();

        return view('livewire.components.show-employee-meal-log-component', [
            'employee_meal_log_data' => $employee_meal_log_data,
            'meal_types' => $meal_types,
            'companies' => $companies
        ]);
    }

    public function refreshShowComponent()
    {
        $this->render();
    }
}
