<?php

namespace App\Livewire\ParentComponents;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;


class EmployeeMealTrackerComponent extends Component
{
    protected $listeners = ['mealLogUpdated' => 'refreshShowComponent'];
    public $autofocus = "autofocus";

    public $datefrom = null;
    public $dateto = null;

    protected $rules = [
        'datefrom' => 'required',
        'dateto' => 'required|after_or_equal:datefrom',
    ];



    public function generateemployeemeal()
    {
        $this->validate();

        // $data = [
        //   'test'  => 1,
        // ];

        // $pdf = Pdf::loadView('livewire.generate-documents-component.generate-employee-meal-reports-component', $data);
        // $pdf->setPaper('a4', 'landscape');
        // $pdf->setOption('filename', 'Daily_Report.pdf');
        // return $pdf->stream();

        dd('test');

        $data = [
            'test'  => 1,
          ];
      

        try {
            $pdf = Pdf::loadView('livewire.generate-documents-component.generate-employee-meal-reports-component', $data);
            $pdf->setPaper('a4', 'landscape');
            $pdf->setOption('filename', 'Daily_Report.pdf');
            return $pdf->stream();
        } catch (\Exception $e) {
            // Log or handle the exception
            return redirect()->back()->with('error', 'Failed to generate PDF.');
        }
        
    }

    public function render()
    {
        return view('livewire.parent-components.employee-meal-tracker-component')->layout('layouts.app');
    }

    public function refreshShowComponent()
    {
        $this->dispatch('refreshShowComponent');
    }
}
