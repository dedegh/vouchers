<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Recipient
 *
 * @author emodatt08
 */
class Recipient extends Model {
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'first_name', 'other_names', 'email'
    ];
    
    /**
     * name of database table.
     *
     * @var array
     */
    public $table = "recipients";
    
     /**
     * name of primary key.
     *
     * @var array
     */
    public $primaryKey = "id";
    
    
    
}
