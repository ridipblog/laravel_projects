<?php

namespace App\Http\Controllers;

use App\Models\EmployeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    public function register(Request $request)
    {
        $employe = EmployeModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $employe->createToken('Employe')->accessToken;
        return response()->json(['token' => $token, 'employe' => $employe]);
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('employe')->attempt($data)) {
            $get_user = EmployeModel::where('email', $request->email)->first();
            Auth::login($get_user);
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
