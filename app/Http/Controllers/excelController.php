<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class excelController extends Controller
{
    public function export($eventId)
    {


        return Excel::download(new ExcelExport($eventId), 'rekapNilai.xlsx');
    }
}
