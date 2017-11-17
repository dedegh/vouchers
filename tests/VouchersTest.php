<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Description of VouchersTest
 *
 * @author emodatt08
 */
class VouchersTest extends TestCase{
    
    /*
 * Voucher Saving Testing
 *
 * @return void
 */
     public function testSaveVoucher()
    {
        $this->json('POST', '/api/v1/voucher', [
            'recipient_id' => '3',
            'special_offer_id' => '2',
            'expiration_date' => '2017-12-09'
            
            
            ])
             ->seeJson([
                'responseCode' => "200",
                'responseMessage' => "Voucher details saved successfully",
             ]);
    }
    
      
    /*
 * Percentage Discount Testing
 *
 * @return void
 */
  
    public function testPercentageDiscount(){
         
        $this->json('GET', '/api/v1/voucher/Ed12fTyB/eddynikoi@gmail.com', [])
             ->seeJson([
                'responseCode' => "200",
                'responseMessage' => "Fixed percentage discount fetched successfully",
             ]);
        
    }
    
    
      
    /*
 * Voucher Codes with the Name of the Special Offers Testing
 *
 * @return void
 */
     public function testCodesWithSpecialOffers(){
         
        $this->json('GET', '/api/v1/voucher/eddynikoi@gmail.com', [])
             ->seeJson([
                'responseCode' => "200",
                'responseMessage' => "Voucher codes with their Special Offers fetched successfully",
             ]);
        
    }
    
    
}
