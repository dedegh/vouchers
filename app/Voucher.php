<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Voucher
 *
 * @author emodatt08
 */
class Voucher extends Model {
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'recipient_id', 'special_offer_id', 'expiration_date', 'created', 'status'
    ];
    
    /**
     * name of database table.
     *
     * @var array
     */
    public $table = "vouchers";
    
     /**
     * name of primary key.
     *
     * @var array
     */
    public $primaryKey = "id";
    
       /**
     * disable timestamps.
     *
     * @var array
     */
    public $timestamps = false;
    
    
    
}