<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create()
    {
        return view('home', ['name' => 90]);
    }
}
