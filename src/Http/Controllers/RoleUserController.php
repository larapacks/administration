<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\RoleUserRequest;
use Larapacks\Authorization\Authorization;

class RoleUserController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:admin.roles,admin.users');
    }

    /**
     * Adds the requested users to the specified role.
     *
     * @param RoleUserRequest $request
     * @param int|string      $roleId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleUserRequest $request, $roleId)
    {
        $role = Authorization::role()->findOrFail($roleId);

        if ($request->persist($role)) {
            flash()->success('Successfully added users.');
        } else {
            flash()->error("You didn't select any users!");
        }

        return redirect()->route('admin.roles.show', [$roleId]);
    }
}
