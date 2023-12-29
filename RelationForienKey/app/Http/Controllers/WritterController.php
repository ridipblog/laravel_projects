<?php

namespace App\Http\Controllers;

use App\Models\WritterBankModel;
use App\Models\WritterEducationModel;
use App\Models\WritterModel;
use Illuminate\Http\Request;

class WritterController extends Controller
{
    public function addWritter(Request $request)
    {
        $writter = WritterModel::create([
            'name' => 'coder 1'
        ]);
        WritterBankModel::create([
            'writter_id' => $writter->id,
            'account_number' => '123'
        ]);
        WritterEducationModel::create([
            'writter_id' => $writter->id,
            'board_name' => 'board name 1'
        ]);
        return response()->json(['message' => 'Added']);
    }
    public function deleteWritter(Request $request)
    {
        $deleteID = WritterModel::find($request->id);
        if ($deleteID) {
            $deleteID->delete();
        }
        return response()->json(['message' => 'Deleted']);
    }
}
