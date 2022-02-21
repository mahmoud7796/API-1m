<?php
namespace App\Traits;


Trait ResponseJson{

    function jsonResponse($responseObject,$Err_Flag,$message,$statusCode){
        $responseJson = ['Err_Flag' => $Err_Flag, 'message' => $message, 'data'=>$responseObject ];
        return response()->json($responseJson,$statusCode);
    }

    function jsonResponseError($Err_Flag,$Err_Desc,$statusCode){
        $responseJson = ['Err_Flag' => $Err_Flag, 'Err_Desc' => $Err_Desc];
        return response()->json($responseJson,$statusCode);
    }

}
