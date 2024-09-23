<?php
namespace App\Http\Controllers\Api\backend;
use App\Traits\ApiFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class LoginController extends Controller{
    use ApiFunctions;

    //https://medium.com/@niravdchavda/multiple-authentication-guards-for-laravel-restful-apis-jwt-617dfa24368d
    public function login(Request $request) {


            $rules = array(
            'email' => 'email|required|max:300',
            'password' => 'required|max:300',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }else{

                $credentials = $request->only('email', 'password');
          try {
              if (!$token = \Auth::guard('api')->attempt($credentials)) {
                  return response()->json(['success' => false, 'error' => 'Some Error Message'], 401);
              }
          } catch (JWTException $e) {
              return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
          }
    
            return $this->respondWithToken($token);
        }


           


  

          
        

    }
}
