<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDController extends Controller
{
    public function add()
    {
        DB::table('user')->insert(['name' => 'code1@gmail.com']);
    }
}
