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
        // $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay')
        //     ->withHeader('Content-Type:application/json')
        //     ->withHeader('X-VERIFY:' . $finalXHeader)
        //     ->withData(json_encode(['request' => $encoded]))
        //     ->post();
        // $rData = json_decode($response);
        // return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(['request' => $encoded]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-VERIFY: ' . $finalXHeader
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $rData = json_decode($response);

        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
        // dd($rData);
    }
    public function response(Request $request)
    {
        $input = $request->all();

        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;

        $finalXHeader = hash('sha256', '/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'] . $saltKey) . '###' . $saltIndex;

        // $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
        //         ->withHeader('Content-Type:application/json')
        //         ->withHeader('accept:application/json')
        //         ->withHeader('X-VERIFY:'.$finalXHeader)
        //         ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
        //         ->get();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'accept: application/json',
                'X-VERIFY: ' . $finalXHeader,
                'X-MERCHANT-ID: ' . $input['transactionId']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        dd(json_decode($response));


        // $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/merchantId/merchantTransactionId')
        //     ->withHeader('Content-Type:application/json')
        //     ->withHeader('X-VERIFY:' . $finalXHeader)
        //     ->withData(json_encode(['request' => $encoded]))
        //     ->post();

    }
}
