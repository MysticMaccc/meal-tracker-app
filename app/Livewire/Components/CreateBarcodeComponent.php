<?php

namespace App\Livewire\Components;

use App\Models\Barcode;
use App\Models\Category;
use App\Models\Category_type;
use Livewire\Component;

class CreateBarcodeComponent extends Component
{
    public $card_number;
    public $barcode_value;
    public $category_id;
    public $category_type_id;
    public $owner;
    public $company;
    public $start_date;
    public $end_date;

    protected $rules = [
        'card_number' => 'required|numeric' , 
        'barcode_value' => 'required|numeric' , 
        'category_id' => 'required' , 
        'category_type_id' => 'required' , 
        'owner' => 'required|max:50' , 
        'company' => 'required|alpha|max:50' , 
        'start_date' => 'required|date' , 
        'end_date' => 'required|date' , 
    ];

    public function render()
    {
        $category_data = Category::where('is_deleted' , 0)->orderBy('name','asc')->get();
        $category_type_data = Category_type::where('is_deleted' , 0)->orderBy('name','asc')->get();

        return view('livewire.components.create-barcode-component' , compact('category_data' , 'category_type_data'));
        // ->layout('layouts.none');
    }

    public function create()
    {
            $this->validate();
            try 
            {
                Barcode::create([
                    'card_number' => $this->card_number,
                    'barcode_value' => $this->barcode_value,
                    'category_id' => $this->category_id,
                    'category_type_id' => $this->category_type_id,
                    'owner' => $this->owner,
                    'company' => $this->company,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
                session()->flash('success' , 'Barcode info successfully created!');
            } 
            catch (\Exception $e) 
            {
                session()->flash('error' , 'error: '.$e->getMessage());
            }
    }

}
