<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\PermissionUserRequest;

class PermissionUserController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:admin.permissions,admin.users');
    }

    /**
     * Adds the specified permission on the requested users.
     *
     * @param PermissionUserRequest $request
     * @param int|string            $permissionId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionUserRequest $request, $permissionId)
    {
        $permission = Authorization::permission()->findOrFail($permissionId);

        if ($request->persist($permission)) {
            flash()->success('Successfully added users.');

            return redirect()->route('admin.permissions.show', [$permissionId]);
        } else {
            flash()->error("You didn't select any users!");

            return redirect()->route('admin.permissions.show', [$permissionId]);
        }
    }
}
