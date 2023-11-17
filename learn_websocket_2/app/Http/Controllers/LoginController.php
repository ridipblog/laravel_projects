<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        DB::table('users')
            ->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
        return view('login');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $login_data = User::where('email', $email)
            ->first();
        Auth::login($login_data);
        return redirect('login_dash');
    }
    public function login_dash()
    {
        return view('login_dash');
    }
}
