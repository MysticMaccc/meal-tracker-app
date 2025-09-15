<?php

namespace App\Livewire\Components;

use App\Models\Barcode;
use App\Models\Category;
use App\Models\Category_type;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BarcodeListItemComponent extends Component
{
    public $barcode;
    public $is_Edit = 0;
    public $owner;
    public $company;
    public $start_date;
    public $end_date;
    public $category;
    public $category_type;
    protected $rules = [
        'owner' => 'required',
        'company' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ];

    public function mount()
    {
        $this->owner = $this->barcode->owner;
        $this->company = $this->barcode->company;
        $this->start_date = $this->barcode->start_date;
        $this->end_date = $this->barcode->end_date;
        $this->category = $this->barcode->category->id;
        $this->category_type = $this->barcode->category_type->id;
    }

    public function render()
    {
        $category_data = Category::all();
        $category_type_data = Category_type::all();
        return view('livewire.components.barcode-list-item-component', compact('category_data', 'category_type_data'));
    }

    public function update()
    {
        $this->validate();
        $barcode_data = Barcode::find($this->barcode->id);
        $update = $barcode_data->update([
            'category_id' => $this->category,
            'category_type_id' => $this->category_type,
            'owner' => $this->owner,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ]);

        if ($update) {
            $this->dispatch('dataUpdated');
            $this->is_Edit = 1;
        }
    }

    public function edit($id)
    {
        $this->is_Edit = $id;
    }

    public function close()
    {
        $this->is_Edit = 0;
    }

    public function generate_Barcode($id)
    {
        Session::put('id', $id);
        return redirect()->to('/Generate-Document/barcodeCard');
    }

    public function generate_QRcode($id)
    {
        Session::put('id', $id);
        return redirect()->to('/Generate-Document/QRCode');
    }

    public function delete($id)
    {
        try {
            $barcode = Barcode::find($id);
            if (!$barcode) {
                $this->dispatch('dataUpdated', message: 'Barcode not found.', type: 'error');
                return;
            }

            DB::transaction(function () use ($barcode) {
                // Delete dependent employee meal logs first
                $barcode->employee_meal_log()->delete();
                // Then delete the barcode
                $barcode->delete();
            });

            $this->dispatch('dataUpdated', message: 'Barcode and related meal logs deleted.', type: 'success');
        } catch (QueryException $e) {
            $this->dispatch('dataUpdated', message: 'Delete failed due to related records (FK constraint).', type: 'error');
        } catch (\Throwable $e) {
            $this->dispatch('dataUpdated', message: 'Unexpected error during delete.', type: 'error');
        }
    }
}
