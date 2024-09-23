<?php
namespace App\Http\Controllers\backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\backend\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use ThrottlesLogins;
	public $maxAttempts = 5;
    public $decayMinutes = 1;

    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    public function login(LoginRequest $request)
    {

        $remember = $request->get('remember');
        $credentials    =  array(
            'email'     => strtolower($request->get('email')),
            'password'  => $request->get('password'),
            'is_active' =>'1',
        );
        if (Auth::guard('admin')->attempt($credentials,['remember'  => !empty($remember) ? $remember : null])) {
           $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended(route('admin.dashboard')); // get redirect to backend dashboard
        }

        // If login fails, increment login attempts

        // Check if the user is already locked out due to too many failed attempts
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // If login fails, increment login attempts
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);


    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();

            $request->session()->flush();
            $request->session()->regenerate();

            return redirect()->route('admin.login.form')->with('logout', trans('login.logout')); // redirect to backend login page
        }
    }
    protected function sendFailedLoginResponse(LoginRequest $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')], // Provide an error message for failed login
        ]);
    }
    // Throttle key used for limiting login attempts based on email and IP
    protected function throttleKey(LoginRequest $request)
    {
        return strtolower($request->input('email')) . '|' . $request->ip();
    }
    public function username(){
        return 'email';
    }
}
