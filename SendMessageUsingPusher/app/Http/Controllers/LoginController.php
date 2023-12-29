<?php

namespace App\Http\Controllers;

use App\Models\UserDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return view('login');
        }
        return redirect('/person-profile');
    }
    public function store(Request $request)
    {
        $login_data = UserDetailsModel::where('name', $request->name)->first();
        if ($login_data) {
            Auth::login($login_data);
            return redirect('/person-profile');
        }
    }
}
