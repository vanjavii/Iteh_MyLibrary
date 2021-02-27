<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

class BaseController extends Controller
{
    //
    public function sendResponse($result, $message){
        $response = [
            'success'=>true,
            'data'=>$result,
            'message'=>$message
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $error_messages = [],$code=404){
        $response = [
            'success'=>false,
            'message'=>$error
        ];

        if(!empty($error_messages)){
            $response['data']=$error_messages;
        }
        return response()->json($response, $code);

    }
}
