<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImportView;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelViewController extends Controller
{
    public function import_excel(Request $request)
    {
        return view('import_excel');
    }
    public function excel_view(Request $request)
    {
        $employes = Excel::toArray(new ExcelImportView, $request->file);
        return redirect('/excel_import')->with('employes', $employes);
    }
}
