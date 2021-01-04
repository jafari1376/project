<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SoapClient;
use App\Cart;

class PaymentController extends Controller
{
    public $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';

    public function getPayment()
    {

        $MerchantID = $this->MerchantID; //Required
        $Amount = Session::get('cart')->totalQty; //Amount will be based on Toman - Required
        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = auth()->user()->email; // Optional
        $Mobile = '09123456789'; // Optional
        $CallbackURL = 'http://localhost:8000/verify'; // Required


        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest([
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]);

                //Redirect to URL You can do it also by creating a form
                    if ($result->Status == 100)
                    {
                        alert()->success('پرداخت با موفقیت انجام شد','پرداخت')->persistent('بستن');
                       return redirect($CallbackURL);
                    }
                    else
                        {
                            echo 'ERR: ' . $result->Status;
                            return back();
                        }

    }

    public function verify($Authority)
    {
         //Amount will be based on Toman
        $authority = $Authority;

        if ($_GET['Status'] == 'OK') {

            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $Authority,

                ]
            );

            if ($result->Status == 100) {
                alert()->success('پرداخت با موفقیت انجام شد.','پرداخت')->persistent('بستن');
            } else {
                echo 'Transation failed. Status:'.$result->Status;
            }
        } else {
            echo 'Transaction canceled by user';
        }
    }
}
