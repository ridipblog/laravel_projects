<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManualDatableController extends Controller
{
    public function index()
    {
        return view('practic_datatable.manual_datatable');
    }
    public function loadData(Request $request)
    {
        $count_total = DB::table('datatable_practic')
            ->count();
        $page = $count_total / 10;
        $data = DB::table('datatable_practic')
            ->offset(0)
            ->limit(10)
            ->get();
        $page = intval($page);
        return response()->json(['data' => $data, 'page' => $page]);
    }
    public function loadPageData(Request $request)
    {
        $offset = $_GET['index'];
        $offset = $offset * 10;
        $data = DB::table('datatable_practic')
            ->offset($offset)
            ->limit(10)
            ->get();
        return response()->json(['data' => $data]);
    }
    public function searchData(Request $request)
    {
        $search_value = $_GET['search_value'];
        DB::table('datatable_practic')
            ->orWhere('name', 'like', '%' . $search_value . '%')
            ->get();
    }
}
