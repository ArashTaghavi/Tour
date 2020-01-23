<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function validateLogin(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            $this->username() => 'required|string',
            'password' => 'required|string',
            /*'captcha'=>'required|captcha'*/
        ]);
        $validator->after(function ($validator) use ($request) {
            $user = User::whereEmail($request->get($this->username()))->first();
            if (!empty($user)) {
                $passwordValidation = \Hash::check($request->get('password'), $user->password);
                if (!$passwordValidation) {
                    $validator->errors()->add('email', __('auth.failed'));
                }
            }
        });
        $validator->validate();
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->role == User::ADMIN)
            return redirect('/admin');
        if ($user->role == User::USER)
            return redirect('/user');
    }
}
