<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('person_profile');
    }
}
