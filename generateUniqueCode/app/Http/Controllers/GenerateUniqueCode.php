<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class GenerateUniqueCode extends Controller
{
    public function index()
    {
        $check = true;
        // try {
        //     $id = DB::table('employee')
        //         ->insertGetId([
        //             'emp-code' => 'empcode2',
        //             'name' => 'code 2',
        //             'email' => 'code2@gmail.com'
        //         ]);
        // } catch (Exception $err) {
        //     $check = false;
        // }


        // $name = "coder 4";
        // $base_code = Str::slug($name);
        // $randString = Str::random(7);
        // $unique_code = $base_code . '-' . $randString;

        try {
            $id = DB::table('employee')
                ->insertGetId([
                    'emp-code' => 'empcode1' . DB::select('select id from employee order by id desc limit 1')[0]->id,
                    'name' => 'emp name 10',
                    'email' => 'code11@gmail.com'
                ]);
        } catch (Exception $err) {
            $check = false;
        }
        dd($id);
    }
    public function register(Request $request)
    {
        $error_message = [
            "required" => ':attribute Is Required',
        ];
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email_id' => 'required'
            ],
            $error_message
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->all()]);
        } else {
            return response()->json(['message' => 'ok']);
        }
    }
}
