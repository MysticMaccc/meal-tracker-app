<?php

namespace App\Livewire\GenerateDocumentsComponent;

use App\Models\Barcode;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use TCPDF;

class GenerateQRCodeComponent extends Component
{
    public function render()
    {
        return view('livewire.generate-documents-component.generate-q-r-code-component');
    }

    public function generate_QRcode()
    {
        $id = Session::get('id');
        $barcode_data = Barcode::find($id);
        
        if(!$barcode_data){
            session()->flash('error' , 'Barcode data don\'t exist');   
            return redirect()->to('/Emp-Barcode-List/show');
        }

        // create new PDF document
        $pdf = new TCPDF('P', 'mm', array(54, 86), true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Network Operation Center');
        $pdf->SetTitle('Barcode Card');
        $pdf->SetSubject('Barcode Card');
        // Disable header and footer
        $pdf->SetPrintHeader(false);
        // Disable automatic page breaks
        $pdf->SetAutoPageBreak(false);

        // Add a page
        $pdf->AddPage();

        // Set background image
        $imagePath = public_path('assets/images/oesximg/1.jpg'); // Set the path to your background image
        $pdf->Image($imagePath, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);

        // Set blend mode for overlay
        $pdf->SetAlpha(0.5); // Adjust the alpha value as needed for transparency

        // Add light blue overlay
        $overlayColor = array(173, 216, 230); // RGB values for light blue color
        $pdf->SetFillColorArray($overlayColor);
        $pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'F');

        // Reset blend mode
        $pdf->SetAlpha(1);

        // Load logo
        $imagePath = public_path('assets/images/meal-tracking-images/logo.png');
        $pdf->Image($imagePath, $x = 10, $y = 10, $w = 30, $h = 0, $type = '', $link = '', $align = '', $resize = false, 
        $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0, $fitbox = true, $hidden = false, $fitonpage = false);
        
        // set style for barcode
        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        // QRCODE,M : QR-CODE Medium error correction
        $pdf->write2DBarcode(env('QRCODE_URL').$barcode_data->barcode_value, 'QRCODE,M', 10, 20, 40, 40, $style, 'N');
        $pdf->Text(20, 85, 'QRCODE M');

        
        
        $pdf->setY(58);
        //name
        $pdf->setFont('helvetica', 'B', 13 , '' , 'default' , true);
        $pdf->Cell(35,6,$barcode_data->owner,0,1,'C',false,'',0,false,'T','M');
        // company
        $pdf->setFont('helvetica', 'B', 7 , '' , 'default' , true);
        $pdf->setFont('helvetica', 'B', 7 , '' , 'default' , true);
        $pdf->Cell(35,6,$barcode_data->company,0,1,'C',false,'',0,false,'T','M');

        //valid until
        $pdf->setXY(24,81);
        $pdf->setFont('helvetica', 'B', 7 , '' , 'default' , true);
        $pdf->Cell(17.5,6,"Valid until:  ".date_format(date_create($barcode_data->end_date) , 'd-M-Y'),0,0,'L',false,'',0,false,'T','M');

        // Output PDF
        $pdf->Output();

    }
}
