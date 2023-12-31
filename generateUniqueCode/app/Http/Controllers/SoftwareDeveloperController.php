<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Query;
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
    public function searchByOneInput_2(Request $request)
    {
        $search_query = $request->search_query;
        $all_data = DB::table('software_developer as main_table')
            ->join('designations as desig_table', 'desig_table.id', '=', 'main_table.designation_id')
            ->select(
                'main_table.*',
                'main_table.id as main_id',
                'desig_table.*'
            )
            ->get();
        $filter_data = [];
        $search_keys = [
            'emp_code',
            'email',
            'phone_number',
            'designation_name'

        ];
        foreach ($all_data as $data) {
            foreach ($search_keys as $search_key) {
                $count_search_query = 0;
                $temp_string = "";
                // $data = json_decode(json_encode($data), true);
                $data = (array)$data;
                $current_value = $data[$search_key];
                if (strlen($current_value) >= strlen($search_query)) {
                    for ($i = 0; $i < strlen($current_value); $i++) {
                        if ($count_search_query < strlen($search_query)) {
                            if ($current_value[$i] == $search_query[$count_search_query]) {
                                $temp_string .= $search_query[$count_search_query];
                                $count_search_query++;
                            } else {
                                if ($count_search_query != 0) {
                                    break;
                                }
                            }
                        } else {
                            break;
                        }
                    }
                    if ($temp_string == $search_query) {
                        array_push($filter_data, (object)$data);
                        break;
                    }
                }
            }
        }
        return response()->json(['count' => count($filter_data), 'data' => $filter_data]);
    }
    // Search By District Block GP
    public function searchByDistrictBlockGP(Request $request)
    {
        // $query = DB::table('software_developer');
        // $sub_query_1 = DB::table('software_developer')
        //     ->where('email', 'email1@gmail.com')
        //     ->select('email');

        // $data = $query
        //     ->where('emp_code', 'emp_code1')
        //     ->whereIn('email', $sub_query_1)
        //     ->get();

        // return response()->json(['count' => count($data), 'data' => $data]);

        // ------------------------------Second Approch-----------------------------------

        // $usersQuery = DB::table('software_developer');
        // $emp_code = "emp_code1";
        // $email = "email1@gmail.com";
        // $phone = "1234441";
        // if ($emp_code) {
        //     $usersQuery->where('emp_code', $emp_code);
        // }

        // if ($email) {
        //     $usersQuery->Where('email', $email);
        // }

        // if ($phone) {
        //     $usersQuery->Where('phone_number', $phone);
        // }

        // notes ---------------------------------Thrid Approch--------------------------------------
        // $users = $usersQuery
        //     ->get();
        // $search_keys = [
        //     'emp_code' => 'emp_code1',
        //     'email' => 'email1@gmail.com',
        //     'phone_number' => ''
        // ];
        // $usersQuery = DB::table('software_developer');
        // foreach ($search_keys as $search_key => $search_value) {
        //     if ($search_value) {
        //         $usersQuery->where($search_key, $search_value);
        //     }
        // }
        // $users = $usersQuery->get();

        // return response()->json(['data' => $users, 'count' => count($users)]);

    }
}
