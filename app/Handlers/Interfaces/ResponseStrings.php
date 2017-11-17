<?php
/**
 * Created by PhpStorm.
 * User: emodatt08
 * Date: 12/05/2017
 * Time: 9:33 AM
 */

namespace App\Handlers\Interfaces;


class ResponseStrings implements Responses
{
    /* Success Code/Messages  */
    var $successResponseCode = "000";
    var $successResponseMsg = "Success";

    /* Failure Code/Messages  */
    var $failureResponseCode = "106";
    var $failureResponseMsg = "An internal error occured";

    /* Try/Catch Code/Messages */
    var $extraFailureResponseCode = "108";
    var $extraFailureResponseMsg = "Something went wrong";

    /* MySQL Try/Catch Code/Messages */
    var $mySQLextraFailureResponseCode = "105";
    var $mySQLextraFailureResponseMsg = "Something went wrong";

    /* Core-Banking Error Code/Messages */
    var $coreBankingFailureResponseCode = "103";
    var $coreBankingFailureResponseMsg = "A Core-Banking error occured";

    /* Platform Error Code/Messages */
    var $platFormFailureResponseCode = "102";
    var $platFormFailureResponseMsg = "A Platform error occured";

    var $otherSuccessResponse = "Success";

    public  function tryResponse($responseData)
    {
         return [
                    'responseCode' => $this->extraFailureResponseCode,
                    'responseMsg' => $this->extraFailureResponseMsg,
                    'data' => $responseData
                                ];
    }

    public function successResponse($responseData)
    {
        return [
                    'responseCode' => $this->successResponseCode,
                    'responseMsg' => $this->successResponseMsg,
                    'data' => $responseData

                                ];
    }

    public function successWithParamsResponse($responseData, $extra)
    {
        return [
            'responseCode' => $this->successResponseCode,
            'responseMsg' => $this->successResponseMsg,
            'data' => $responseData,
            'meta' => $extra

        ];
    }

    public  function failureResponse()
    {
        return [
            'responseCode' => $this->failureResponseCode,
            'responseMsg' => $this->failureResponseMsg,
            'data' => []

                                ];
    }
    public  function otherFailureResponse($responseData)
    {
        return [
            'responseCode' => $this->failureResponseCode,
            'responseMsg' => $this->extraFailureResponseMsg,
            'data' => $responseData

        ];
    }
    public function otherSuccessResponse($responseData, $name, $extra = [])
    {
        return [
            'responseCode' => $this->failureResponseCode,
            'responseMsg' => $this->extraFailureResponseMsg,
            'data' => $responseData,
             $name => $extra
        ];
    }
    
    public function mySQLTryCatchFailureResponse($responseData){
        return [
            'responseCode' => $this->mySQLextraFailureResponseCode,
            'responseMsg' => $this->mySQLextraFailureResponseMsg,
            'data' => $responseData,

        ];
        
    }

    public function platFormErrorFailureResponse($responseData){
        return [
            'responseCode' => $this->platFormFailureResponseCode,
            'responseMsg' => $this->platFormFailureResponseMsg,
            'data' => $responseData,
        ];
    }

    public function coreBankingFailureResponse($responseData){
        return [
            'responseCode' => $this->coreBankingFailureResponseCode,
            'responseMsg' => $this->coreBankingFailureResponseMsg,
            'data' => $responseData,
        ];
    }
}