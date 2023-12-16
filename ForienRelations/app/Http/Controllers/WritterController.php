<?php

namespace App\Http\Controllers;

use App\Models\WritterBankModel;
use App\Models\WritterEducationModel;
use App\Models\WritterModel;
use Exception;
use Illuminate\Http\Request;

class WritterController extends Controller
{
    public function addWritter(Request $request)
    {
        $check_first_step = true;
        $message = null;
        try {
            $writter = WritterModel::create([
                'name' => $request->name
            ]);
            $check_first_step = true;
        } catch (Exception $err) {
            $check_first_step = false;
        }
        if ($check_first_step) {
            $check_second_step = true;
            try {
                $bank = WritterBankModel::create([
                    'account_number' => $request->account_number,
                    'writter_id' => $writter->id
                ]);
                $check_second_step = true;
            } catch (Exception $err) {
                $check_second_step = false;
            }
            if ($check_second_step) {
                $check_thrid_step = true;
                try {
                    $education = WritterEducationModel::create([
                        'board_name' => $request->board_name,
                        'writter_id' => $writter->id
                    ]);
                    $check_thrid_step = true;
                } catch (Exception $err) {
                    $check_thrid_step = false;
                }
                if ($check_thrid_step) {
                    $message = "Done";
                } else {
                    if ($this->deleteUser($writter->id)) {
                        $message = "Error In Education Table";
                    } else {
                        $message = "Server Error";
                    }
                }
            } else {
                if ($this->deleteUser($writter->id)) {
                    $message = "Error In Bank Table";
                } else {
                    $message = "Server Error";
                }
            }
        } else {
            $message = "Error In Writter Table";
        }
        return response()->json(['message' => $message]);
    }
    public function deleteUser($id)
    {
        try {
            $writterDelete = WritterModel::find($id);
            if ($writterDelete) {
                $writterDelete->delete();
                return true;
            }
            return false;
        } catch (Exception $err) {
            return false;
        }
    }
}
