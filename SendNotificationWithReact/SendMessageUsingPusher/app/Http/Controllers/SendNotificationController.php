<?php

namespace App\Http\Controllers;

use App\Events\AllUserMessageEvent;
use Illuminate\Http\Request;

class SendNotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $user = $request->name;
        $message = $request->sendMessage;

        event(new AllUserMessageEvent($user, $message));
        return response()->json(['message' => $request->name]);
    }
}
