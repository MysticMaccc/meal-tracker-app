<?php

namespace App\Livewire\GenerateDocumentsComponent;

use App\Models\Employee_meal_log;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class GenerateEmployeeMealReportsComponent extends Component
{

   public $datefrom;
    public $dateto;

    public function generatePdf()
    {

        // dd('test');
        $this->validate([
            'datefrom' => 'required',
            'dateto'   => 'required',
        ]);

        $records = Employee_meal_log::whereBetween('date_scanned', [$this->datefrom, $this->dateto])->get();
        $names = [];

        foreach ($records as $record) {
            $names[] = $record->barcode->owner;
        }

        $data = ['names' => $names];

        $pdf = PDF::loadView('livewire.generate-documents-component.generate-employee-meal-reports-component', $data);
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOption('filename', 'Daily_Report.pdf');
        return $pdf->stream();
    }


    // public function generatePdf($datefrom, $dateto) {

    //     $records = Employee_meal_log::whereBetween('date_scanned', [$datefrom, $dateto])
    //     ->get();

    //     foreach ($records as $record) {
    //         $name = $record->barcode->owner;
           
    //     }

    //     $pdf = Pdf::loadView('livewire.generate-documents-component.generate-employee-meal-reports-component', $data);
    //     $pdf->setPaper('a4', 'landscape');
    //     $pdf->setOption('filename', 'Daily_Report.pdf');
    //     return $pdf->stream();

    // } 


    
    // public function generateemployeemeal()
    // {
    //     $this->validate();

    //     $data = [
    //       'test'  => 1,
    //     ];

    //     $pdf = Pdf::loadView('livewire.generate-documents-component.generate-employee-meal-reports-component', $data);
    //     $pdf->setPaper('a4', 'landscape');
    //     $pdf->setOption('filename', 'Daily_Report.pdf');
    //     return $pdf->stream();
    // }

    public function render()
    {
        return view('livewire.generate-documents-component.generate-employee-meal-reports-component');
    }
}
