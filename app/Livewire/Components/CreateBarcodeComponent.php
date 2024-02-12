<?php

namespace App\Livewire\Components;

use App\Models\Barcode;
use App\Models\Category;
use App\Models\Category_type;
use Illuminate\Support\Facades\Session;
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
        'company' => 'required|string|max:50' , 
        'start_date' => 'required|date|after_or_equal:today' , 
        'end_date' => 'required|date|after:start_date' , 
    ];

    public function mount()
    {
        $barcode_data = Barcode::orderBy('id', 'desc')->get();

        $this->card_number = ($barcode_data->first() ? $barcode_data->first()->card_number : null) + 1;
        $this->barcode_value = ($barcode_data->first() ? $barcode_data->first()->barcode_value : null) + 1;
    }

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
                $create_barcode = Barcode::create([
                    'card_number' => $this->card_number,
                    'barcode_value' => $this->barcode_value,
                    'category_id' => $this->category_id,
                    'category_type_id' => $this->category_type_id,
                    'owner' => $this->owner,
                    'company' => $this->company,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);

                $new_barcode_id = $create_barcode->id;
                Session::put('id' , $new_barcode_id);
                session()->flash('success' , 'Barcode info successfully created!');

                return redirect()->to('/Generate-Document/barcodeCard');
            } 
            catch (\Exception $e) 
            {
                session()->flash('error' , 'error: '.$e->getMessage());
            }
    }

}
