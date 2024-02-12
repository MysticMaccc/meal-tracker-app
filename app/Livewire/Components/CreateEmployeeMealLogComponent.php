<?php

namespace App\Livewire\Components;

use App\Models\Barcode;
use App\Models\Employee_meal_log;
use Carbon\Carbon;
use Livewire\Component;

class CreateEmployeeMealLogComponent extends Component
{
    public $barcode_value ;
    public $meal_type;
    public $currentTime;
    public $autofocus;

    protected $rules = [
        'barcode_value' => 'required'
    ];

    public function mount($autofocus)
    {
        $this->autofocus = $autofocus;
    }

    public function render()
    {
        return view('livewire.components.create-employee-meal-log-component');
        // ->layout('layouts.none');
    }
    
    public function filterTime()
    {
        // $currentTime = Carbon::parse('16:00:00');
        $currentTime = Carbon::parse($this->currentTime);

        if ($currentTime->isBetween('05:00:00', '09:00:00')) {
            $result = '1';
        } elseif ($currentTime->isBetween('11:00:00', '13:30:00')) {
            $result = '2';
        } elseif ($currentTime->isBetween('16:00:00', '20:00:00')) {
            $result = '3';
        } else {
            $result = NULL;
        }

        return $result;
    }

    public function store()
    {
            $this->validate();
            try 
            {
                $barcode_data = Barcode::where('barcode_value' , $this->barcode_value)
                                        ->first();
                if(date('Y-m-d') <= $barcode_data->end_date){
                                //----------------------------------------------------//
                                //----------------------------------------------------//
                                $this->meal_type = $this->filterTime();
                                if(is_null($this->meal_type)){
                                    session()->flash('error', 'You can only scan between 0500-0900H, 1100-1300H and 1600-2000H');
                                }else{
                                    $check_meal_log = Employee_meal_log::where('barcode_id' , $barcode_data->id)
                                                                    ->where('meal_type_id' , $this->meal_type)
                                                                    ->where('date_scanned' , date('Y-m-d'))
                                                                    ->get();
                                                                    
                                                                    if ($check_meal_log->isEmpty()) {
                                                                        // Meal log does not exist, create a new entry
                                                                        Employee_meal_log::create([
                                                                            'barcode_id' => $barcode_data->id,
                                                                            'date_scanned' => date('Y-m-d'),
                                                                            'time_scanned' => now()->toTimeString(),
                                                                            'meal_type_id' => $this->meal_type
                                                                        ]);
                                                                    
                                                                        session()->flash('success', 'Meal recorded successfully!');
                                                                        $this->dispatch('mealLogUpdated');
                                                                    } else {
                                                                        // Meal log already exists, display an error message
                                                                        session()->flash('error', 'Barcode already scanned!');
                                                                    }
                                }
                                //----------------------------------------------------//
                                //----------------------------------------------------//
                }else{
                    session()->flash('error', 'Your barcode is already expired!');
                }
            } 
            catch (\Exception $e) 
            {
                session()->flash('error' , $e->getMessage());
            }
            $this->barcode_value = '';
    }

}
