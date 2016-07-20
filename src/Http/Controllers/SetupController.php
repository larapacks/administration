<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\SetupRequest;

class SetupController extends Controller
{
    /**
     * Displays the welcome page for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('admin::setup.welcome');
    }

    /**
     * Displays the form for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function begin()
    {
        return view('admin::setup.begin');
    }

    /**
     * Finishes the administration setup.
     *
     * @param SetupRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function finish(SetupRequest $request)
    {
        if ($request->persist(Authorization::user())) {
            return view('admin::setup.complete');
        }

        flash()->error('Error!', 'There was an issue completing setup. Please try again.');

        return redirect()->route('admin.setup.begin');
    }
}
