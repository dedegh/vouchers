<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;
use \Illuminate\Database\Eloquent\Model;
/**
 * Description of SpecialOffer
 *
 * @author emodatt08
 */
class SpecialOffer extends Model {
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'fixed_percentage_discount', 'created_at'
    ];
    
    /**
     * name of database table.
     *
     * @var array
     */
    public $table = "specialOffers";
    
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
    public $timeStamps = false;
    
}
