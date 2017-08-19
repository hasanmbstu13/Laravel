<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        $setting = Setting::first();
        return view('auth.login', compact('setting'));
    }

    protected function redirectTo()
    {
        $user = auth()->user();
        if($user->hasRole('admin')){
            return 'admin/dashboard';
        }
        elseif($user->hasRole('employee')){
            return 'member/dashboard';
        }
        elseif($user->hasRole('client')){
            return 'client/dashboard';
        }

    }
}
