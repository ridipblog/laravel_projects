<?php

namespace App\Http\Controllers;

use App\Models\UserDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $login_data = DB::table('user_details')
            ->where('name', $request->name)
            ->get();
        if (count($login_data) != 0) {
            return view('person_profile', [
                'name' => $login_data[0]->name
            ]);
        } else {
            return view('login');
        }
    }
}
