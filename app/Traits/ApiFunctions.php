<?php
namespace App\Traits;
use JWTAuth;
use JWTFactory;
use App\Models\Player;
use LaravelLocalization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait ApiFunctions
{
 
 
    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'code'   => $errNum,
            'msg'    => $msg,
        ]);
    }

    public function ValidToken($token, $expire_date)
    {
        return response()->json([
            'status' => false,
            'code'   => '500',
            'msg'    => 'Token Expired',
        ]);
    }

 
 
 
    public function returnData($key, $value, $response_code, $msg = '')
    {
        return response()->json([
            'status'    => true,
            'code'      => $response_code ?? 'S000',
            'msg'       => $msg,
            $key        => $value,
        ]);
    }
 
    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        ], 200);
    }

    
 
 
 
}
