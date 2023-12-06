<?php

namespace App\Livewire\Components;

use App\Models\Trainee_meal_log;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTraineeMealLogComponent extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = ['refreshShowComponent'];

    public function render()
    {
        $trainee_meal_data = Trainee_meal_log::where('date_scanned' , 'LIKE' , '%'.$this->search.'%')
                                              ->orWhere('time_scanned' , 'LIKE' , '%'.$this->search.'%')
                                              ->orWherehas('trainee_list' , function($query){
                                                    $query->where('rank' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('lastname' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('firstname' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('middlename' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('course' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('course_code' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('course_type' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('company' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('bus' , 'LIKE' , '%'.$this->search.'%')
                                                          ->orWhere('dorm' , 'LIKE' , '%'.$this->search.'%');
                                              })
                                              ->orWherehas('meal_type' , function($query2){
                                                $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                 })
                                              ->orderBy('id' , 'desc')
                                              ->paginate(10);

        return view('livewire.components.show-trainee-meal-log-component' , compact('trainee_meal_data'));
        // ->layout('layouts.none');
    }

    public function refreshShowComponent()
    {
            $this->render();
    }
}
