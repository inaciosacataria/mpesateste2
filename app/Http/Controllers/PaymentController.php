<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function handlePayment(Request $request){
    
       
        $mpesa = new \Explicador\E2PaymentsPhpSdk\Mpesa();
        $mpesa->setClientId('98ce725a-544b-4841-9304-74efef98534e');
        $mpesa->setClientSecret('14bOAVyBNAcwp6qRK2aRwrDO1z7fjqSWUdEPL03J');
        $mpesa->setWalletId('123523');// 'live' production environment 
      
        $amount= 10;
        $reference= 'CursoDoSegredo';

        $result = $mpesa->c2b($request->phone_number, $amount, $reference);
 
        $status = $result->status;      

       if($status==200){
        $response = $result->response;
         $successMessage = $response->success;
        return view('done', array('sucess'=>$successMessage));
       }else{
      
         $response = $result->response->error;
         return view('error', array('error'=>$response));
       }
    }
}
