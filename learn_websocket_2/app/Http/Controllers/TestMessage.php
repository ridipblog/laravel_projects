<?php

namespace App\Http\Controllers;

use App\Events\TestData;

use Illuminate\Http\Request;

class TestMessage extends Controller
{
    public function index()
    {
        // event(new TestData('New Sent Message'));
        return view('testmessage');
    }
    public function sent_test_message()
    {
        event(new TestData('New Sent Message'));
        return response()->json(['message' => 'Sent Message']);
    }
}
