<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $users->createToken('Token')->accessToken;
        return response()->json(['token' => $token, 'user' => $users], 200);
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            // $user = auth()->user();
            $user = Auth::user();
            $token = $user->createToken('token')->accessToken;
            return response()->json(['token' => $token, 'user' => $user], 200);
        } else {
            return response()->json(['token' => "UnAuthrize User"], 400);
        }
    }
    public function userInfo()
    {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }
}
