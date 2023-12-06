<?php

namespace App\Livewire\Components;

use App\Models\Barcode;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBarcodeComponent extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $barcode_data = Barcode::where('card_number' , 'like' , '%'.$this->search.'%')
                                ->orWhere('barcode_value' , 'like' , '%'.$this->search.'%')
                                ->orWhere('owner' , 'like' , '%'.$this->search.'%')
                                ->orWhere('company' , 'like' , '%'.$this->search.'%')
                                ->orWhere('start_date' , 'like' , '%'.$this->search.'%')
                                ->orWhere('end_date' , 'like' , '%'.$this->search.'%')
                                ->orWherehas('category' ,function ($query) {
                                        $query->where('name' , 'like' , '%'.$this->search.'%');
                                })
                                ->orWherehas('category_type' ,function ($query2) {
                                        $query2->where('name' , 'like' , '%'.$this->search.'%');
                                })
                                ->paginate(10);

        return view('livewire.components.show-barcode-component',[
            'barcode_data' => $barcode_data
        ]);
        // ->layout('layouts.none');
    }
}
