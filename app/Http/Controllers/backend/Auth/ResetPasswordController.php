<?php

namespace App\Http\Controllers\backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */

     public function showResetForm($token,Request $request){
        return view('backend.auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
     }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required','min:8'],
        ]);

        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Admin $admin, string $password) {
                $admin->forceFill([
                    'password' => Hash::make($password)
                ]);

                $admin->save();
            }
        );

         $status === Password::PASSWORD_RESET;
         return $status === Password::PASSWORD_RESET
         ? redirect()->route('admin.login.form')->with('resetpassword', __($status))
         : back()->withErrors(['email' => [__($status)]]);







    }
}
