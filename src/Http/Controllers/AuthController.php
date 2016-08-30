<?php

namespace Larapacks\Administration\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

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

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        // Set the redirect to route after users login.
        $this->redirectTo = route('admin.welcome.index');

        // Set the redirect after logout route after users logout.
        $this->redirectAfterLogout = route('admin.auth.login');
    }

    /**
     * {@inheritdoc}
     */
    public function showLoginForm()
    {
        return view('admin::auth.login');
    }
}
