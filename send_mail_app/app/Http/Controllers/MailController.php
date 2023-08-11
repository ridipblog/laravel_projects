<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create()
    {
        $data = ['name' => 'Code 1', 'data' => 'developer'];
        $user['to'] = 'memorytemp5@gmail.com';
        Mail::send('mail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Hello Subject');
        });
    }
}
