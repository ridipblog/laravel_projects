<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\MachenicModel;
use App\Models\OwnerModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasOneThroughController extends Controller
{
    public function create_example_1(Request $request)
    {
        $check = false;
        DB::beginTransaction();
        try {
            $machenic = new MachenicModel();
            $machenic->name = "Machenic 1";
            $machenic->save();
            if (!$machenic->id) {
                throw new Exception("Error ");
            }
            $car = new CarModel();
            $car->car = "car 1";
            $machenic->car()->save($car);
            if (!$car->id) {
                throw new Exception("Error");
            }
            $owner = new OwnerModel();
            $owner->owner = "Owner 1";
            $car->owner()->save($owner);
            if (!$owner->id) {
                throw new Exception("Error");
            }
            $check = true;
            DB::commit();
        } catch (Exception $err) {
            $check = false;
            DB::rollBack();
        }
        return response()->json(['message' => $check]);
    }
    public function show_owner(Request $request)
    {
        // Get Owner By Machenic Id
        // $owner = MachenicModel::find(4)->car->owner;
        $owner = MachenicModel::find(4)->owner;
        $machenic = OwnerModel::with('car.machenic')->find(2);
        return response()->json(['message' => $machenic]);
    }
    public function show_machenic(Request $request)
    {
        $machenic = MachenicModel::with('car')->find(1);
        return response()->json(['message' => $machenic]);
    }
    public function show_car(Request $request)
    {
        // $cars = MachenicModel::find(1)->car;
        $cars = CarModel::with('owner')->find(1);
        return response()->json(['message' => $cars]);
    }
}
