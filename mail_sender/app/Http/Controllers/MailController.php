<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function basic_mail()
    {
        $data = array('name' => 'Only Code', 'body' => 'This Code is Noting Else');
        Mail::send(['html' => 'mail'], $data, function ($message) {
            $message->to('ridipgoswami147@gmail.com', 'Ridip Goswami')->subject("Just Test Mail Service");

            $message->from('memorytemp5@gmail.com', 'Only Code');
        });
        return response()->json(['message' => 'Ok']);
    }
}
