<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class APICallController extends Controller
{
    public function getData(Request $request)
    {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $data = [
            $name,
            $email,
            '<h1>hello</h1>'
        ];
        return response()->json(['message' => $data]);
    }
    public function postData(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $encrypted = Crypt::encryptString($email);
        $decrypted = Crypt::decryptString($encrypted);
        $data = [
            $name,
            $encrypted,
            $decrypted
        ];
        return response()->json(['message' => $data]);
    }
    public function apiHit()
    {
        return view('api_call');
    }
}
