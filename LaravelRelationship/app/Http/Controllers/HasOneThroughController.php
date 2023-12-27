<?php

namespace App\Http\Controllers;

use App\Models\MachenicModel;
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
        } catch (Exception $err) {
            $check = false;
            DB::rollBack();
        }
    }
}
