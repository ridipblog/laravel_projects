<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function create()
    {
        if (Auth::user()) {
            return redirect('dashboard');
        } else {
            return view('welcome');
        }
    }
}
