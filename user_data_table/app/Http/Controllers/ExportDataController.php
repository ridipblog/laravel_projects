<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ExportDataController extends Controller
{
    public function export_show()
    {
        return view('user_data');
    }
    public function export()
    {
        $user_data = DB::table('all_employe_details')->get();
        return response()->json(['message' => $user_data]);
    }
}
