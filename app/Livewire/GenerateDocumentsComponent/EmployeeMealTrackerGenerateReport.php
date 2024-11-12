<?php

namespace App\Livewire\GenerateDocumentsComponent;

use Livewire\Component;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Files\LocalTemporaryFile;

class EmployeeMealTrackerGenerateReport implements WithEvents
{
    use Exportable;
    public $employee_meal_log_data;

    public function __construct($employee_meal_log_data)
    {
        $this->employee_meal_log_data = $employee_meal_log_data;
    }

    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function (BeforeWriting $event) {
                $templateFile = new LocalTemporaryFile(storage_path('app/public/template/Meal_Log.xlsx'));
                $event->writer->reopen($templateFile, Excel::XLSX);
                $sheet = $event->writer->getSheetByIndex(0);

                $this->WriteSheet($sheet);

                $event->writer->getSheetByIndex(0)->export($event->getConcernable());

                return $event->getWriter()->getSheetByIndex(0);
            },
        ];
    }

    private function WriteSheet($sheet)
    {
        $rownumber = 2;
        $autoIncrement = 1;

        foreach ($this->employee_meal_log_data as $record) {
            $sheet->setCellValue('A' . $rownumber, $record->barcode->card_number);
            $sheet->setCellValue('B' . $rownumber, $record->barcode->owner);
            $sheet->setCellValue('C' . $rownumber, $record->meal_type->name);
            $sheet->setCellValue('D' . $rownumber, $record->barcode->category->name);
            $sheet->setCellValue('E' . $rownumber, $record->barcode->category_type->name);
            $sheet->setCellValue('F' . $rownumber, $record->date_scanned);
            $sheet->setCellValue('G' . $rownumber, $record->time_scanned);
            $rownumber++;
            $autoIncrement++;
        }
    }
}
