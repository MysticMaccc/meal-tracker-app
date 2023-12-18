<?php

namespace App\Livewire\GenerateDocumentsComponent;

use Illuminate\Support\Facades\View;
use Livewire\Component;
use TCPDF;

class TraineeMealTrackerGenerateReport extends Component
{
    public function generatePDF(){


        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

         // Set document information
         $pdf->SetCreator('NETIOESX');
         $pdf->SetAuthor('NETIOESX');
         $pdf->SetTitle('Trainee Meal Logs Report');
         $pdf->SetSubject('Meal Logs');
         $pdf->SetKeywords('NETI');

            // Set page margin to zero
        $pdf->SetMargins(4, 0, 4, 1, true); // Set all margins to zero

        // Set auto page break mode
        $pdf->SetAutoPageBreak(false, 0); // Disable automatic page breaks

          // Remove header border
          $pdf->setPrintHeader(false); // Disable printing header
          $pdf->setPrintFooter(false); // Disable printing footer
          $pdf->setPageOrientation('landscape');
          $name = "Trainee Meal Report - ".session('daterange');
          // Add a page
          $pdf->AddPage();

            // Render Blade view to get HTML content
        $html = View::make('livewire.generate-documents-component.trainee-meal-tracker-generate-report',[
            'meal_logs' => session('meal_log'),
            'date_range' => session('daterange')
        ])->render();

          // Convert HTML to PDF
          $pdf->writeHTML($html, true, false, true, false, '');

          // Output PDF to the browser or save to a file
          $pdf->Output($name, 'I');



    }

    public function render()
    {
        return view('livewire.generate-documents-component.trainee-meal-tracker-generate-report');
    }
}
