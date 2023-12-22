<?php

namespace App\Http\Controllers;

use App\Models\WebDeveloperModel;
use App\Models\WebDeveloperSalaryModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebDeveloperController extends Controller
{
    public function addData(Request $request)
    {
        $check = "";
        DB::beginTransaction();
        try {
            $save_developer = WebDeveloperModel::create([
                'name' => 'name 4',
                'email' => 'email4@gmail.com'
            ]);
            $save_salary = WebDeveloperSalaryModel::create([
                'employee_id' => $save_developer->id,
                'salary' => "300000"
            ]);
            DB::commit();
            $check = "data inserted";
        } catch (Exception $err) {
            DB::rollBack();
            $check = "Error";
        }
        try {
            $save_salary = WebDeveloperSalaryModel::create([
                'employee_id' => 33,
                'salary' => "300000"
            ]);
            DB::commit();
            $check .= "Inserted I Second";
        } catch (Exception $err) {
            DB::rollBack();
            $check .= "Errro In Second";
        }
        return $check;
    }
}
