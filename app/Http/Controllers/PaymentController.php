<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function handlePayment(Request $request){
    
       
        $mpesa = new \Explicador\E2PaymentsPhpSdk\Mpesa();
        $mpesa->setClientId('98cd2d3b-5e4f-42e0-8c93-d01fc871b858');
        $mpesa->setClientSecret('adazkz8CM456yLhzNQz4m3JOOmmFVEm3fHkrbDFh');
        $mpesa->setWalletId('508517');// 'live' production environment 
      
        $amount= 1200;
        $reference= 'CursoDoSegredo';

        $result = $mpesa->c2b($request->phone_number, $amount, $reference);

        dd($result);
    }
}
