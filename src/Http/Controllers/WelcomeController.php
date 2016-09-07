<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;

class WelcomeController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:admin');
    }

    /**
     * Displays the admin welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = Authorization::user()->count();

        $roles = Authorization::role()->count();

        $permissions = Authorization::permission()->count();

        return view('admin::welcome.index', compact('users', 'roles', 'permissions'));
    }
}
