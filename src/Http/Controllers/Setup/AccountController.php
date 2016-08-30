<?php

namespace Larapacks\Administration\Http\Controllers\Setup;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\SetupRequest;
use Larapacks\Administration\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('admin.setup.account');
    }

    /**
     * Displays the form for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::setup.account.create');
    }

    /**
     * Finishes the administration setup.
     *
     * @param SetupRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(SetupRequest $request)
    {
        if ($request->persist(Authorization::user())) {
            return view('admin::setup.account.finished');
        }

        flash()->error('Error!', 'There was an issue completing setup. Please try again.');

        return redirect()->route('admin.setup.account.create');
    }
}
