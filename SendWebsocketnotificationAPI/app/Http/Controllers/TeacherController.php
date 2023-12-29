<?php

namespace App\Http\Controllers;

use App\Models\TeacherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function teacherLogin(Request $request)
    {
        $check = null;
        // $USers = TeacherModel::create([
        //     'email' => 'name1@gmail.com',
        //     'password' => '12'
        // ]);
        $login_data = [
            "email" => $request->email,
            "password" => $request->password
        ];
        if (Auth::guard('teacher')->attempt($login_data)) {
            $login_user = TeacherModel::where('email', $request->email)->first();
            $check = true;
            if ($check) {
                Auth::login($login_user);
                $user = Auth::user();
                $token = $login_user->createToken('AdminToken')->accessToken;
                $check = $token;
            }
        } else {
            $check = false;
        }
        return response()->json(['message' => $check]);
    }
    public function teacherProfile(Request $request)
    {
        $check = Auth::user();


        // For Logout
        // if (auth()->user()) {
        //     Auth::user()->tokens->each(function ($token) {
        //         $token->revoke();
        //     });
        // }
        return response()->json(['message' => $check]);
    }
}
