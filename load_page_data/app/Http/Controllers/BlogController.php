<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog(Request $request)
    {
        $blogs = '';
        if ($request->ajax()) {
            for ($i = 0; $i < 10; $i++) {
                $blogs .= '<p class="para">Para ' . $i . '</p>';
            }
            return $blogs;
        }
        return view('blogs');
    }
}
