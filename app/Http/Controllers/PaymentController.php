<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Mail\SubscribeMail;
use App\Mail\AdminNotification;
use App\Mail\FailedNottification;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function handlePayment(Request $request){    
        $mpesa = new \Explicador\E2PaymentsPhpSdk\Mpesa();
        $mpesa->setClientId('your client Id');
        $mpesa->setClientSecret('your client secret');
        $mpesa->setWalletId('your wallet id');// 'live' production environment 
      
        $amount= '1'; //your amount to pay
        $number = '84xxxxxxx'; // your number
        $reference= 'PaymentReference'; // reference

        $result = $mpesa->c2b($number, $amount, $reference);
 
        $status = $result->status;      

       if($status==200){
         $response = $result->response;
         $successMessage = $response->success;
         
        return $successMessage;
       }else{
         
       
          return $result;
       }
    }   
  }