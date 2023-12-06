<?php

namespace App\Livewire\Components;

use App\Models\Trainee_list;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTraineeListComponent extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $trainee_list_data = Trainee_list::where('rank' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('lastname' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('firstname' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('middlename' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('course' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('course_code' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('course_type' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('company' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('bus' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('dorm' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('training_start_date' , 'LIKE' , '%'.$this->search.'%')
                                         ->orWhere('training_end_date' , 'LIKE' , '%'.$this->search.'%')
                                         ->orderBy('id' , 'desc')->paginate(10);
        
        return view('livewire.components.show-trainee-list-component' , [
            'trainee_list_data' => $trainee_list_data
        ]);
        // ->layout('layouts.none');
    }
}
