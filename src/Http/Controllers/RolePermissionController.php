<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\RolePermissionRequest;
use Larapacks\Administration\Processors\Admin\RolePermissionProcessor;
use Larapacks\Authorization\Authorization;

class RolePermissionController extends Controller
{
    /**
     * Adds the requested permissions to the specified role.
     *
     * @param RolePermissionRequest $request
     * @param int|string            $roleId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RolePermissionRequest $request, $roleId)
    {
        $role = Authorization::role()->findOrFail($roleId);

        if ($request->persist($role)) {
            flash()->success('Successfully added permissions.');
        } else {
            flash()->error("You didn't select any permissions.");
        }

        return redirect()->back();
    }

    /**
     * Removes the specified permission from the specified role.
     *
     * @param int|string $roleId
     * @param int|string $permissionId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roleId, $permissionId)
    {
        $role = Authorization::role()->findOrFail($roleId);

        $permission = $role->permissions()->findOrFail($permissionId);

        if ($role->permissions()->detach($permission)) {
            flash()->success('Successfully removed permission.');
        } else {
            flash()->error('There was an issue removing this permission. Please try again.');
        }

        return redirect()->back();
    }
}
