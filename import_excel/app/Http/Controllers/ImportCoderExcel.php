<?php

namespace App\Http\Controllers;

use App\Imports\ImportCoder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportCoderExcel extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ImportCoder, $request->file('file'));
        // return redirect('/excel-import')->with('message', 'Imported');
        return response()->json(['message' => "Imported"]);
    }
}
