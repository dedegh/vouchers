<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
/**
 * Description of VoucherController
 *
 * @author emodatt08
 */
class VouchersController extends Controller {
    public $validate;
    public function __construct() {
        $this->validate = new \App\Validators\VoucherRequest();
    }
    
/*
 * gets a voucher
 * @param $request
 * @return Illuminate\Http\JsonResponse
 */
    public function index(Request $request){
        $voucher = $this->randomString(8);
             return response()->json([
            'responseCode'=>'200', 
            'responseMessage' => 'Voucher fetched successfully', 
            'data' => ['voucher'=>$voucher]]);
    }
    
    /*
 * random string generator
 * @param $length the length of the string to create
 * @return $str the string
 */
function randomString($length) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

/*
 * returns the Percentage Discount 
 * @param $request
 * @return Illuminate\Http\JsonResponse
 */
    public function verify(Request $request, $code, $email){
       try{
          //get recipient
        $recipient = \App\Recipient::where('email', $email)->first();
        
       }catch(\Exception $e){
            return response()->json([
                            'responseCode'=>'404', 
                            'responseMessage' => $e->getMessage(),
                ]);
       }
        //verify recipient
                if($recipient){
                        //get voucher
                        $voucher = \App\Voucher::where('code', $code)->first();
                        //verify voucher
                        if($voucher){
                            //set date of usage
                            $voucher->used_date = date('Y-m-d');
                            //set status
                            $voucher->status = "1";
                            
                            if($voucher->save()){
                                //get special offer id
                            $specialOffer = \App\Voucher::where('recipient_id', $recipient->id)->first();
                            //get fixed percentage discount
                            $percentage = \App\SpecialOffer::where('id', $specialOffer->special_offer_id)->first();
                            
                                     return response()->json([
                                    'responseCode'=>'200', 
                                    'responseMessage' => 'Fixed percentage discount fetched successfully', 
                                    'data' => ['fixed_percentage_discount' => $percentage->fixed_percentage_discount]]);
                            }
                        }else{
                                     return response()->json([
                                    'responseCode'=>'404', 
                                    'responseMessage' => 'There is no voucher for '.$recipient->first_name . " ".$recipient->last_name ]);
                        }
                }else{
                     return response()->json([
                            'responseCode'=>'404', 
                            'responseMessage' => 'Failed to fetch recipient', 
                 ]);
                }
        
    }
    /*
 * returns Voucher Codes with the Name of the Special Offers
 * @param $request
 * @return Illuminate\Http\JsonResponse
 */
    
    public function offer(Request $request, $email){
        //set special offer array
        $specialOfferArray = [];
        $voucherCodes = [];
        //get recipient id
        $recipient = \App\Recipient::where('email', $email)->first();
        if($recipient){
        
        //get all voucher codes for recipient
        $vouchers = \App\Voucher::where('recipient_id', $recipient->id)->get();
        
        if(count($vouchers) > 1){
        //get special offers
            
        foreach($vouchers as $offer){
                $specialOffers = \App\SpecialOffer::where('id', $offer->special_offer_id)->get();
                   //if there is more than one special offer
                if(count($specialOffers) > 1){
                    
                    foreach($specialOffers as $specialOffer){
                    $specialOfferArray[] = $specialOffer->name;
                    
                  }
                 
                  foreach($vouchers as $voucher){
                       $voucherCodes[] = $voucher->code;
                        
                  }
                 
        }else{
            
             $specialOffer = \App\SpecialOffer::where('id', $offer->special_offer_id)->get(['name']);
             $voucherCodes[] = $offer->code;
             $specialOfferArray[] = $specialOffer;
        }
        }
        
         return response()->json([
                                    'responseCode'=>'200', 
                                    'responseMessage' => 'Voucher codes with their Special Offers fetched successfully', 
                                    'data' => ['voucher' =>  $voucherCodes, 'special_offer'=> $specialOfferArray]]);
         }elseif (count($vouchers) == 1) {
              //get special offer
               $specialOffer = \App\SpecialOffer::find($vouchers->special_offer_id)->first();
             return response()->json([
                                    'responseCode'=>'200', 
                                    'responseMessage' => 'Voucher code with their Special offer fetched successfully', 
                                    'data' => ['voucher' => $vouchers->code, 'special_offer'=> $specialOffer->name]]);
              
            }else{
               return response()->json([
                            'responseCode'=>'404', 
                            'responseMessage' => 'There are no vouchers for '. $recipient->first_name." ". $recipient->last_name, 
                ]);
         }
        }else{
            return response()->json([
                            'responseCode'=>'404', 
                            'responseMessage' => 'Failed to fetch recipient', 
                ]);
        } 
    }
    
       /*
 * stores a voucher code for a given recipient and expiration date
 * @param $request
 * @return Illuminate\Http\JsonResponse
 */
    public function store(Request $request){
        //validates input
        $this->validate->rules_for_vouchers($request);
        //insert voucher info
        $voucher = \App\Voucher::create([
            'code'=>$this->randomString(8), 
            'recipient_id'=>$request['recipient_id'],
            'special_offer_id'=>$request['special_offer_id'],
            'expiration_date'=>$request['expiration_date'],
            'created'=> date('Y-m-d H:i:s')              
                ]);
        if($voucher){
           return response()->json([
                                    'responseCode'=>'200', 
                                    'responseMessage' => 'Voucher details saved successfully'
                                  
                                   ]);  
        }else{
              return response()->json([
                                    'responseCode'=>'500', 
                                    'responseMessage' => 'Failed to store Voucher details ', 
                                   ]);  
        }
        
    }
    
}
