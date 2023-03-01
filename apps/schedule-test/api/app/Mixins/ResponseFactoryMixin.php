<?php
namespace App\Mixins;

class ResponseFactoryMixin
{
    public function successResponse()
    {
        return function($data=null,$code=200,$message = 'ok'){
            return [
                'code'=> $code,
                'data' => $data,
                'message' => $message
            ];
        };
    }

    public function errorResponse()
    {
        return function($message=null, $code=500, $errors = null) {
            $data = [
                'code' => $code,
                'message' => $message,
                'data' => $errors
            ];

            return response()->json($data);
        };
    }
}
