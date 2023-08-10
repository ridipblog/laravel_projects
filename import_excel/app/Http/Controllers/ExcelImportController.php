<?php

namespace App\Http\Controllers;

use App\Imports\ImportEmploye;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import_view(Request $request)
    {
        return view('import_excel');
    }
    public function import(Request $request)
    {
        Excel::import(new ImportEmploye, $request->file);
        return redirect('/excel-import')->with('message', 'Imported');
    }
}
