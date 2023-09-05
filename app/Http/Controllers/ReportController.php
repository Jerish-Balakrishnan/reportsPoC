<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportData;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    public function generatePDF()
    {
        $data = ReportData::all();
        $pdf = Pdf::loadView('pdf_view', ['data' => $data])->setPaper('a4', 'portrait');
        return $pdf->download('report.pdf');
    }

    public function generateExcel()
    {
        $data = ReportData::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'First Name');
        $sheet->setCellValue('C1', 'Last Name');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'Email');
        
        $rowCount = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $rowCount, $datum->id);
            $sheet->setCellValue('B' . $rowCount, $datum->firstname);
            $sheet->setCellValue('C' . $rowCount, $datum->lastname);
            $sheet->setCellValue('D' . $rowCount, $datum->mobile);
            $sheet->setCellValue('E' . $rowCount, $datum->email);
            $rowCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = 'report.xlsx';
        $writer->save($filePath);

        return response()->download($filePath);
    }
}

