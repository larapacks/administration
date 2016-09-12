<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;

class DashboardController extends Controller
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
        return view('admin::dashboard.index', [
            'users' => Authorization::user()->count(),
            'roles' => Authorization::role()->count(),
            'permissions' => Authorization::permission()->count(),
        ]);
    }
}
