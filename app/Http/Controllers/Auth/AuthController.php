<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  App\Http\Requests\Auth\LoginRequest  $request
     * @param  Guard  $auth
     * @return Response
     */
    public function postLogin(LoginRequest $request, Guard $auth) {
        $email = $request->input('email');
        $password = $request->input('password');

        $emailAccess = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $throttles = in_array(ThrottlesLogins::class, class_uses_recursive(get_class($this)));

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return redirect('/admin/login')
                ->with('error', trans('auth/login.maxattempt'))
                ->withInput($request->only('email'));
        }

        $credentials = [
            $emailAccess  => $email,
            'password'  => $password
        ];

        if (!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect('/admin/login')
                ->with('error', trans('auth/login.credentials'));
        }

        $user = $auth->getLastAttempted();

        if ($user->exists()) {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }

            if($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            $auth->login($user);

            return redirect('/admin');
        }

        $request->session()->put('user_id', $user->id);

        return redirect('/admin/login')
            ->with('error', trans('auth/login.credentials'));
    }
}
