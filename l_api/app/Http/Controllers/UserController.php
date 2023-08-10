<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_fun(Request $request)
    {
        return view('user');
    }
}
