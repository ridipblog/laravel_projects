<?php

namespace App\Http\Controllers;

use App\Models\BuyerModel;
use App\Models\MobileModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OneToOneController extends Controller
{
    public function create_example_1(Request $request)
    {
        $check = false;
        try {
            $check = true;
            $buyer = new BuyerModel();
            $buyer->buyer_name = "buyer 3";
            $buyer->save();
            $check = true;
            if ($check) {
                try {
                    $mobile = new MobileModel();
                    $mobile->phone_name = "Phone 2";
                    $buyer->mobile()->save($mobile);
                    $check = true;
                } catch (Exception $err) {
                    $check = false;
                }
            }
        } catch (Exception $err) {
            $check = false;
        }
        if (!$check) {
            if ($buyer->id) {
                $buyer_id = BuyerModel::find($buyer->id);
                if ($buyer_id) {
                    $buyer_id->delete();
                }
            }
        }
        return response()->json(['message' => [$buyer->id, $check]]);
    }
    // DB Transaction
    public function create_example_2(Request $request)
    {
        DB::beginTransaction();
        try {
            $buyer = new BuyerModel();
            $buyer->buyer_name = "Buyer 5";
            $buyer->save();
            if (!$buyer->id) {
                throw new Exception("Error");
            }
            $mobile = new MobileModel();
            $mobile->phone_name = "Phone 5";
            $buyer->mobile()->save($mobile);
            if (!$mobile->id) {
                throw new Exception("Error");
            }
            $check = true;
            DB::commit();
        } catch (Exception $err) {
            $check = false;
            DB::rollBack();
        }
        return response()->json(['message' => [$check]]);
    }
    // read Data
    public function read_data_example1(Request $request)
    {
        $buyer = BuyerModel::find(4);
        $mobile = MobileModel::find(2);
        $data = [
            [
                $buyer->id,
                $buyer->buyer_name
            ],
            [
                $mobile->id,
                $mobile->buyer_model_id,
                $mobile->phone_name
            ]
        ];
        return response()->json(['message' => $data]);
    }
    public function read_data_example2(Request $request)
    {
        $buyer = BuyerModel::with('mobile')->find(9);
        return response()->json(['message' => $buyer]);
    }
}
