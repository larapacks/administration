<?php

namespace Larapacks\Administration\Http\Controllers;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Constructor.
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
