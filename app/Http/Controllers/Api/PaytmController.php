<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PaytmChecksum;

class PaytmController extends Controller
{
 

 public function checksum(Request $request)
    {
       $as = url('/');
// require_once $as.'/source/vendor/paytm/paytmchecksum/PaytmChecksum.php';

 $params=$request->body;
$key= $request->merchant_key;

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($params, $key);
	$message = array('status'=>'1','message'=>'signature', 'data'=>$paytmChecksum);
	return $message;
	}


public function validatesig(Request $request)
    {
       $as = url('/');
// require_once $as.'/source/vendor/paytm/paytmchecksum/PaytmChecksum.php';

 $params=$request->body;
$key= $request->merchant_key;
$paytmChecksum = $request->signature;
/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$isVerifySignature = PaytmChecksum::verifySignature($params, $key, $paytmChecksum);
if($isVerifySignature) {
	$message = array('status'=>'1','message'=>'matched');
	return $message;
} else {
	$message = array('status'=>'0','message'=>'mis-matched');
	return $message;
}

	}	


}
    
    
    
 













