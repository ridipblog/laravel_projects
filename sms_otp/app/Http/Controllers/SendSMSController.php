<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SendSMSController extends Controller
{
    public function sendSms(Request $request)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');
        // $twilioPhoneNumber = '+12058595933';
        $client = new Client($sid, $token);

        $toPhoneNumber = "+917002142698"; // Replace with the recipient's phone number
        $message = "Hellow"; // Replace with the message you want to send

        $client->messages->create(
            $toPhoneNumber,
            [
                'from' => $twilioPhoneNumber,
                'body' => $message,
            ]
        );

        return "SMS sent successfully!";
    }
}
