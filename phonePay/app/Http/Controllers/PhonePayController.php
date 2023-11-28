<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PhonePayController extends Controller
{
    public function phonepe()
    {
        $data =
            [
                "merchantId" => "PGTESTPAYUAT",
                "merchantTransactionId" => "MT7850590068188104",
                "merchantUserId" => "MUID123",
                "amount" => 10000,
                "redirectUrl" => route('response'),
                "redirectMode" => "REDIRECT",
                "callbackUrl" => route('response'),
                "mobileNumber" => "9999999999",
                "paymentInstrument" => [
                    "type" => "PAY_PAGE"
                ]
            ];
        $encoded = base64_encode(json_encode($data));
        $saltkey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;
        $string = $encoded . '/pg/v1/pay' . $saltkey;
        $sha256 = hash('sha256', $string);
        $finalXHeader = $sha256 . '###' . $saltIndex;
        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay')
            ->withHeader('Content-Type:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withData(json_encode(['request' => $encoded]))
            ->post();
        $rData = json_decode($response);
        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
        // dd($rData);
    }
    public function response(Request $request)
    {
        $input = $request->all();
        // $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/merchantId/merchantTransactionId')
        //     ->withHeader('Content-Type:application/json')
        //     ->withHeader('X-VERIFY:' . $finalXHeader)
        //     ->withData(json_encode(['request' => $encoded]))
        //     ->post();
        dd($input);
    }
}
