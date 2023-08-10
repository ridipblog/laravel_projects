<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestAPIController extends Controller
{
    public function index()
    {
        $emp_data = DB::table('test_api')->get();
        return response()->json($emp_data);
    }
    public function store(Request $request)
    {
        DB::table('test_api')->insert(['name' => $request->name, 'roll' => $request->roll]);
        return response()->json(['message' => 'Employe Added'], 201);
    }
    public function show($id)
    {
        $emp_data = DB::table('test_api')->where('id', $id)->get();
        if (!empty($emp_data)) {
            return response()->json($emp_data);
        } else {
            return response()->json([
                'message' => 'No  Data Found !'
            ], 201);
        }
    }
    public function update(Request $request, $id)
    {
        $emp_data = DB::table('test_api')->where('id', $id)->get();
        if (!empty($emp_data)) {
            DB::table('test_api')->where('id', $id)->update(['name' => $request->name, 'roll' => $request->roll]);
            return response()->json([
                'message' => 'Data Updated !'
            ], 404);
        } else {
            return response()->json([
                'message' => 'No Data Found !'
            ], 404);
        }
    }
    public function delete(Request $request, $id)
    {
        $emp_data = DB::table('test_api')->where('id', $id)->get();
        if (!empty($emp_data)) {
            DB::table('test_api')->where('id', $id)->delete($id);
            return response()->json([
                'message' => 'Data Deleted'
            ], 200);
        } else {
            return response()->json(['message' => 'No Data Found '], 404);
        }
    }
}
