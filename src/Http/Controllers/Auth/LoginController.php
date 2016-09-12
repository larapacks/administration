<?php

namespace Larapacks\Administration\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Larapacks\Administration\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);

        // Set the redirect to route after users login.
        $this->redirectTo = route('admin.dashboard.index');
    }

    /**
     * {@inheritdoc}
     */
    public function showLoginForm()
    {
        return view('admin::auth.login');
    }
}
