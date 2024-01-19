<?php

namespace App\Http\Controllers;

use App\Imports\FormsImport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FormImportController extends Controller
{
    public function index()
    {
        $data = [
            'full name' => 'code 1'
        ];

        return view('form_import');
    }
    public function import(Request $request)
    {
        $check = false;
        DB::beginTransaction();
        try {
            Excel::import(new FormsImport(1), $request->file('file'));
            DB::commit();
            $check = true;
        } catch (Exception $err) {
            DB::rollBack();
        }
        dd($check);
    }
}
