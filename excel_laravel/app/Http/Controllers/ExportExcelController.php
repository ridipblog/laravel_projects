<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function excel()
    {
        // $users = DB::table('model_test')->get();
        return Excel::download(new ExportExcel, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
