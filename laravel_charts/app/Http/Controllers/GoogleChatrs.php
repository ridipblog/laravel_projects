<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleChatrs extends Controller
{
    public function create()
    {
        return view('google_charts');
    }
}
