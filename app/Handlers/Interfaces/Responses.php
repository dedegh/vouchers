<?php
/**
 * Created by PhpStorm.
 * User: emodatt08
 * Date: 12/05/2017
 * Time: 9:26 AM
 */

namespace App\Handlers\Interfaces;


interface Responses
{
    /* Success method Interface */
    public function successResponse ($responseData);

    /* Other Success method Interface */
    public function otherSuccessResponse($responseData, $name, $extra = []);

    /* Failure method Interface */
    public function failureResponse();

    /* Try/Catch method Interface */
    public function tryResponse($responseData);

    /* Other Failure method Interface */
    public function otherFailureResponse($responseData);

    /* MySQL Try/Catch Error method Interface */
    public function mySQLTryCatchFailureResponse($responseData);

    /* Platform Error method Interface */
    public function platFormErrorFailureResponse($responseData);

    /* Core-Banking Failure method Interface */
    public function coreBankingFailureResponse($responseData);

}