<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExcelExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function exportEmployee(Request $request)
    {
        return Excel::download(new EmployeeExcelExport, 'employee.xlsx', \Maatwebsite\Excel\Excel::XLSX, ['Content-Type' => 'text/xlsx']);
    }
}
