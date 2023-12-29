<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::guard('admin')->user()) {
            return view('login');
        }
        Auth::logout();
        Auth::guard('admin')->logout();
        return redirect('admin-profile');
    }
    public function login(Request $request)
    {
        $login_details = AdminModel::where('name', $request->name)->first();
        $check = null;
        if ($login_details) {
            Auth::guard('admin')->login($login_details);
            Auth::login($login_details);
            Auth::guard('admin')->user();
            // if (Auth::guard('admin')->attempt($request->only('name'))) {
            //     // Auth::login($login_details);
            //     $check = "ok";
            // }
        } else {
            $check = "Error";
        }
        return response()->json(['message' => $check]);
    }
    public function adminProfile(Request $request)
    {
        $check = null;
        if (Auth::guard('admin')->user()) {
            $check = Auth::guard('admin')->user();
        }
        return response()->json(['message' => $check, Auth::user()]);
    }
}
