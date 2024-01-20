<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticDatatableServerController extends Controller
{
    public function index()
    {
        return view('practic_datatable.datatable_with_server');
    }
    public function getData(Request $request)
    {
        $columns = ['id', 'name', 'email', 'created_at']; // Define your searchable columns

        $totalData = DB::table('datatable_practic')->count();

        $searchValue = $request->input('search.value');

        $query = DB::table('datatable_practic')
            ->select('id', 'name', 'email', 'created_at');

        // Apply search
        if (!empty($searchValue)) {
            $query->where(function ($query) use ($columns, $searchValue) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $searchValue . '%');
                }
            });
        }

        $totalFiltered = $query->count();

        // Apply pagination
        $start = $request->input('start');
        $length = $request->input('length');
        $query->offset($start)->limit($length);

        $users = $query->get();

        return response()->json([
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $users,
        ]);
    }
}
