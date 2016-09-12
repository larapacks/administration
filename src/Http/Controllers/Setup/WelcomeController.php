<?php

namespace Larapacks\Administration\Http\Controllers\Setup;

use Larapacks\Administration\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('admin.setup.migrations');
    }

    /**
     * Displays the welcome page for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin::setup.welcome');
    }
}
