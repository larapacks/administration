<?php

namespace Larapacks\Administration\Http\Controllers\Setup;

use Larapacks\Administration\Http\Controllers\Controller;

class WelcomeController extends Controller
{
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
