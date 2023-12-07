<?php

namespace App\Livewire\Components;

use App\Models\Trainee_list;
use App\Models\Trainee_meal_log;
use Carbon\Carbon;
use Livewire\Component;

class CreateTraineeMealLogComponent extends Component
{
    public $trainee_id;
    public $meal_type;
    public $currentTime;
    public $autofocus;

    protected $rules = [
        'trainee_id' => 'required'
    ];

    public function mount($autofocus)
    {
        $this->autofocus=$autofocus;
    }
    public function render()
    {
        return view('livewire.components.create-trainee-meal-log-component');
        // ->layout('layouts.none');
    }

    public function save()
    {
        $this->create();
    }

    public function filterTime()
    {
        $currentTime = Carbon::parse($this->currentTime);

        if ($currentTime->isBetween('05:00:00', '10:00:00')) {
            $result = '1';
        } elseif ($currentTime->isBetween('10:00:01', '14:00:00')) {
            $result = '2';
        } elseif ($currentTime->isBetween('14:00:01', '22:00:00')) {
            $result = '3';
        } else {
            $result = NULL;
        }

        return $result;
    }

    public function create()
    {
            $this->validate();

            try 
            {
                $trainee_data = Trainee_list::where('trainee_id' , $this->trainee_id)
                                             ->orderBy('id' , 'desc')
                                             ->first();
                $this->meal_type = $this->filterTime();
                $check_meal_log = Trainee_meal_log::where('trainee_id' , $this->trainee_id)
                                                  ->where('date_scanned' , date('Y-m-d'))
                                                  ->where('meal_type_id' , $this->meal_type)
                                                  ->first();
                if(!$check_meal_log){
                    Trainee_meal_log::create([
                        'trainee_list_id' => $trainee_data->id,
                        'trainee_id' => $trainee_data->trainee_id,
                        'date_scanned' => date('Y-m-d'),
                        'time_scanned' => now()->toTimeString(),
                        'meal_type_id' => $this->meal_type
                    ]);
                    session()->flash('success', 'Meal recorded successfully!');
                    $this->dispatch('mealLogUpdated');
                }else{
                    session()->flash('error', 'Barcode already scanned!');
                }
                
            } 
            catch (\Exception $e) 
            {
                session()->flash('error' , 'error: '.$e->getMessage());
            }
            $this->trainee_id = '';
    }

}
