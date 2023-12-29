<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowAllUserMessageController extends Controller
{
    public function index(Request $request)
    {
        return view('all_user_message');
    }
}
