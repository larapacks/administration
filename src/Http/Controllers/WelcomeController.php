<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;

class WelcomeController extends Controller
{
    /**
     * Displays the admin welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('admin.welcome.index');

        $users = Authorization::user()->count();

        $roles = Authorization::role()->count();

        $permissions = Authorization::permission()->count();

        return view('admin::welcome.index', compact('users', 'roles', 'permissions'));
    }
}
