<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function showLineCharts()
    {
        $visitors = DB::table('posts')->get();
        $result[] = ['Year', 'Click', 'Visitor'];
        foreach ($visitors as $key => $value) {
            $result[++$key] = [$value->title, (int)$value->click, (int)$value->visitor];
        }
        return view('lineCharts')->with('visitor', $result);
    }
}
