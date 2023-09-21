<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    public function index()
    {
        DB::table('table_employe')->insert(['name' => 'coder 1', 'email' => 'coder1@gmail.com']);
        dd("Done");
    }
}
