<?php

namespace App\Http\Controllers;

use App\Models\UserDetailsModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return view('registration');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        $check = false;
        try {
            $users = new UserDetailsModel();
            $users->name = $request->name;
            $users->password = $request->password;
            $users->save();
            DB::commit();
            $check = true;
        } catch (Exception $err) {
            DB::rollBack();
            $check = false;
        }
        dd($check);
    }
}
