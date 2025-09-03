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
    public $employee_meal_log_data, $datefrom, $dateto, $categoryName;

    public function __construct($employee_meal_log_data, $datefrom, $dateto, $categoryName = '')
    {
        $this->datefrom = $datefrom;
        $this->dateto = $dateto;
        $this->employee_meal_log_data = $employee_meal_log_data;
        $this->categoryName = $categoryName;
    }

    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function (BeforeWriting $event) {
                $templateFile = new LocalTemporaryFile(storage_path('app/public/template/Meal_Log2.xlsx'));
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
        // Generate date range array
        $dates = [];
        $currentDate = $this->datefrom;
        while ($currentDate <= $this->dateto) {
            $dates[] = $currentDate;
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }

        // Add Category Type header in row 1
        $sheet->setCellValue('A1', 'Category Type: ' . $this->categoryName);
        $sheet->mergeCells('A1:D1');

        // Add date range header in row 2
        $dateRange = date('F d, Y', strtotime($this->datefrom)) . ' - ' . date('F d, Y', strtotime($this->dateto));
        $sheet->setCellValue('A2', 'Date Range: ' . $dateRange);
        $sheet->mergeCells('A2:D2');

        // Set column headers in row 3
        $sheet->setCellValue('A3', 'Barcode ID');
        $sheet->setCellValue('B3', 'Employee Name');
        $sheet->setCellValue('C3', 'Category');
        $sheet->setCellValue('D3', 'Total');

        // Set headers for dates and meal types starting from column E
        $columnIndex = 5; // Starting from column E (A=1, B=2, C=3, D=4, E=5)
        foreach ($dates as $date) {
            $columnLetter1 = $this->getColumnLetter($columnIndex);
            $columnLetter2 = $this->getColumnLetter($columnIndex + 1);
            $columnLetter3 = $this->getColumnLetter($columnIndex + 2);

            // Date header (row 3) - merge cells for the date
            $sheet->setCellValue($columnLetter1 . '3', $date);
            $sheet->mergeCells($columnLetter1 . '3:' . $columnLetter3 . '3');

            // Meal type headers (row 4)
            $sheet->setCellValue($columnLetter1 . '4', 'Breakfast');
            $sheet->setCellValue($columnLetter2 . '4', 'Lunch');
            $sheet->setCellValue($columnLetter3 . '4', 'Dinner');

            $columnIndex += 3;
        }

        // Group data by employee and meal type per date
        $employeeData = [];
        foreach ($this->employee_meal_log_data as $record) {
            $employeeId = $record->barcode_id;
            if (!isset($employeeData[$employeeId])) {
                $categoryType = $record->barcode->category_type->name ?? 'Unknown';
                $employeeData[$employeeId] = [
                    'barcode_id' => $record->barcode_id,
                    'owner' => $record->barcode->owner,
                    'category' => $record->barcode->category->name . ' - ' . $categoryType,
                    'meals' => []
                ];
            }

            $amount = $this->getMealAmount($record->meal_type_id);
            $mealType = $record->meal_type_id;
            $date = $record->date_scanned;

            if (!isset($employeeData[$employeeId]['meals'][$date])) {
                $employeeData[$employeeId]['meals'][$date] = [1 => 0, 2 => 0, 3 => 0];
            }

            $employeeData[$employeeId]['meals'][$date][$mealType] += $amount;
        }

        $rownumber = 5;
        $grandTotal = 0;

        foreach ($employeeData as $employee) {
            $sheet->setCellValue('A' . $rownumber, $employee['barcode_id']);
            $sheet->setCellValue('B' . $rownumber, $employee['owner']);
            $sheet->setCellValue('C' . $rownumber, $employee['category']);

            // Calculate total amount for this employee
            $totalAmount = 0;
            foreach ($employee['meals'] as $dateMeals) {
                $totalAmount += $dateMeals[1] + $dateMeals[2] + $dateMeals[3];
            }
            $sheet->setCellValue('D' . $rownumber, $totalAmount);
            $grandTotal += $totalAmount;

            // Fill amounts for each date and meal type
            $columnIndex = 5;
            foreach ($dates as $date) {
                $breakfastAmount = $employee['meals'][$date][1] ?? 0;
                $lunchAmount = $employee['meals'][$date][2] ?? 0;
                $dinnerAmount = $employee['meals'][$date][3] ?? 0;

                $sheet->setCellValue($this->getColumnLetter($columnIndex) . $rownumber, $breakfastAmount);
                $sheet->setCellValue($this->getColumnLetter($columnIndex + 1) . $rownumber, $lunchAmount);
                $sheet->setCellValue($this->getColumnLetter($columnIndex + 2) . $rownumber, $dinnerAmount);

                $columnIndex += 3;
            }

            $rownumber++;
        }

        // Add total row
        $sheet->setCellValue('C' . $rownumber, 'TOTAL');
        $sheet->setCellValue('D' . $rownumber, $grandTotal);

        // Apply styling
        $this->applyStyles($sheet, $rownumber, count($dates));
    }

    private function getColumnLetter($columnIndex)
    {
        $columnLetter = '';
        while ($columnIndex > 0) {
            $columnIndex--;
            $columnLetter = chr(65 + ($columnIndex % 26)) . $columnLetter;
            $columnIndex = intval($columnIndex / 26);
        }
        return $columnLetter;
    }

    private function applyStyles($sheet, $lastRow, $dateCount)
    {
        $lastColumn = $this->getColumnLetter(4 + ($dateCount * 3));

        // Category Type row styling (row 1)
        $sheet->getStyle('A1:D1')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '2F5597']
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 14
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ]);

        // Date Range row styling (row 2)
        $sheet->getStyle('A2:D2')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '5B9BD5']
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ]);

        // Column headers row styling (row 3)
        $sheet->getStyle('A3:' . $lastColumn . '3')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '4472C4']
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ]);

        // Meal type headers row styling (row 4)
        $sheet->getStyle('A4:' . $lastColumn . '4')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '8EA4D2']
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 10
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ]);

        // Data rows styling
        $sheet->getStyle('A5:' . $lastColumn . ($lastRow - 1))->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => 'CCCCCC']
                ]
            ]
        ]);

        // Total row styling
        $sheet->getStyle('A' . $lastRow . ':' . $lastColumn . $lastRow)->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFC000']
            ],
            'font' => [
                'bold' => true,
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ]);

        // Auto-size columns
        foreach (range('A', $lastColumn) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Set row heights
        $sheet->getRowDimension(1)->setRowHeight(30);
        $sheet->getRowDimension(2)->setRowHeight(25);
        $sheet->getRowDimension(3)->setRowHeight(25);
        $sheet->getRowDimension(4)->setRowHeight(20);
        $sheet->getRowDimension($lastRow)->setRowHeight(25);
    }

    private function getMealAmount($mealTypeId)
    {
        switch ($mealTypeId) {
            case 1: // Breakfast
                return 75;
            case 2: // Lunch
                return 100;
            case 3: // Dinner
                return 100;
            default:
                return 0;
        }
    }

    private function getMealCategory($mealTypeId)
    {
        switch ($mealTypeId) {
            case 1:
                return 'Breakfast';
            case 2:
                return 'Lunch';
            case 3:
                return 'Dinner';
            default:
                return 'Unknown';
        }
    }
}
