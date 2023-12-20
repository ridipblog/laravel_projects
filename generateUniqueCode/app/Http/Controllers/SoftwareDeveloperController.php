<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoftwareDeveloperController extends Controller
{
    public function addData(Request $request)
    {
        $count_des = 1;
        for ($i = 1; $i < 10; $i++) {
            if ($count_des == 4) {
                $count_des = 1;
            }
            DB::table('software_developer')
                ->insert([
                    'emp_code' => 'emp' . $i . '_code' . $i,
                    'email' => 'email' . $i . '@gma' . $i . 'il.com',
                    'phone_number' => '123' . $i . '444' . $i,
                    'designation_id' => $count_des
                ]);
            $count_des++;
        }
        return response()->json(['message' => 'OK']);
    }
    public function searchByOneInput(Request $request)
    {
        $search_query = $request->search_query;
        $data = DB::table('software_developer as main_table')
            ->join('designations as desig_table', 'desig_table.id', '=', 'main_table.designation_id')
            ->orWhere('main_table.emp_code', 'like', '%' . $search_query . '%')
            ->orWhere('main_table.email', 'like', '%' . $search_query . '%')
            ->orWhere('main_table.phone_number', 'like', '%' . $search_query . '%')
            ->orWhere('desig_table.designation_name', 'like', '%' . $search_query . '%')
            ->select(
                'main_table.*',
                'main_table.id as main_id',
                'desig_table.*'
            )
            ->count();
        return response()->json(['message' => $data]);
    }
}
