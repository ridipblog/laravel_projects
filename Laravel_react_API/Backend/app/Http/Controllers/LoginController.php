<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $users = AdminModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $users->createToken('Token')->accessToken;
        return response()->json(['status' => 200, 'token' => $token, 'user' => $users]);
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('Token')->accessToken;
            return response()->json(['token' => $token, 'user' => $user], 200);
        } else {
            return response()->json(['message' => 'No Users'], 200);
        }
    }
    public function dashbaord(Request $request)
    {
        return response()->json(['message' => Auth::user()], 200);
    }
}
