<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $maxAttempts = 3;
    protected $decayMinutes = 5;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ],[
            'email' => "This is not a valid email",
            'required' => "This :attribute is required",
            'failed' => 'These credentials do not match our records.',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Success
            return redirect()->intended('/index');
        } else {

            if ($this->hasTooManyLoginAttempts($request)) {
    
                    $key = $this->throttleKey($request);
                    $rateLimiter = $this->limiter();
    
    
                    $limit = [3 => 10, 5 => 30];
                    $attempts = $rateLimiter->attempts($key);  // return how attapts already yet
    
                    if($attempts >= 5)
                    {
                        $rateLimiter->clear($key);;
                    }
    
                    if(array_key_exists($attempts, $limit)){
                        $this->decayMinutes = $limit[$attempts];
                    }
                    
                    $this->incrementLoginAttempts($request);
    
                    $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
    
                }
    
                $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }

    }
}
