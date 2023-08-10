<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function show_auth_user(Request $request)
    {
        // return Auth::user();
        // return Auth::id();
        return $request->user();
    }
    public function check_auth_user()
    {
        if (Auth::check()) {
            return 'You Are Authenticate User';
        } else {
            return 'You Are UnAuth User';
        }
    }
    public function report_page()
    {
        return view('report');
    }
    public function un_auth()
    {
        return view('unauth');
    }
}
