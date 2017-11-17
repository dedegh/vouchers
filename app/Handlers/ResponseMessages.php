<?php
/**
 * Created by PhpStorm.
 * User: emodatt08
 * Date: 12/05/2017
 * Time: 9:30 AM
 */

namespace App\Handlers;



use App\Handlers\Interfaces\ResponseStrings;

class ResponseMessages extends ResponseStrings {

    public  function success($data){
        return parent::successResponse($data);
    }

    public  function failure(){
        return parent::failureResponse();
    }

    public  function tryfailure($data){
        return parent::tryResponse($data);
    }

    public  function otherfailure($data){
        return parent::otherFailureResponse($data);
    }

    public function mySQLFailure($data){
        return parent::mySQLTryCatchFailureResponse($data);
    }

    public function coreBankingFailure($data){
        return parent::coreBankingFailureResponse($data);
    }

    public function platFormFailure($data){
        return parent::platFormErrorFailureResponse($data);
    }

}