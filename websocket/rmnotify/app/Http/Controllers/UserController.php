<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendNotification;

class UserController extends Controller
{
    //
    public function sendNotification(Request $request)
    {
        try {

            event(new SendNotification($request->message, auth()->user()->id));

            return response()->json(['success'=>true,'msg'=>'Notification Added']);
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
}
