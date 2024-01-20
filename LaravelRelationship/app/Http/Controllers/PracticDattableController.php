<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticDattableController extends Controller
{
    public function addData()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('datatable_practic')
                ->insert([
                    'name' => 'name-' . (string)$i,
                    'email' => 'name@' . (string)$i . 'gmail.com'
                ]);
        }
        dd("Ok");
    }
    public function index()
    {
        return view('practic_datatable.datatable_with_ajax');
    }
    public function getData(Request $request)
    {
        $data = DB::table('datatable_practic')
            ->get();
        return response()->json(['status' => 200, 'data' => $data]);
    }
}
