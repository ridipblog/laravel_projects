<?php

namespace App\Http\Controllers;

use App\Exports\ModifyExcel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function view_export()
    {
        return Excel::download(new ModifyExcel, 'users.xls', \Maatwebsite\Excel\Excel::XLS, ['Content-Type' => 'text/xls']);
    }
}
