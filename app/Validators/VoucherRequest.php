<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Validators;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Validates Voucher request
 *
 * @author emodatt08
 */
class VoucherRequest extends Controller {
    

  public function rules_for_vouchers($request)
      {
        $this->validate($request, [            
            'recipient_id' => 'required',
            'special_offer_id' => 'required',
            'expiration_date' => 'required',
            
           
        ]);
    }
}