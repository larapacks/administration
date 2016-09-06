<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\RolePermissionRequest;
use Larapacks\Administration\Processors\Admin\RolePermissionProcessor;

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
        if ($this->processor->store($request, $roleId)) {
            flash()->success('Successfully added permissions.');

            return redirect()->route('admin.roles.show', [$roleId]);
        } else {
            flash()->error("You didn't select any permissions.");

            return redirect()->route('admin.roles.show', [$roleId]);
        }
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
        if ($this->processor->destroy($roleId, $permissionId)) {
            flash()->success('Successfully removed permission.');
        } else {
            flash()->error('There was an issue removing this permission. Please try again.');
        }

        return redirect()->back();
    }
}
