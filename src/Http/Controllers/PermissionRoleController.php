<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\PermissionRoleRequest;

class PermissionRoleController extends Controller
{
    /**
     * Adds the specified permission to the requested roles.
     *
     * @param PermissionRoleRequest $request
     * @param int|string            $permissionId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRoleRequest $request, $permissionId)
    {
        $this->authorize('admin.roles.permissions.store');

        $permission = Authorization::permission()->findOrFail($permissionId);

        if ($request->persist($permission)) {
            flash()->success('Success!', 'Successfully added roles.');

            return redirect()->route('admin.permissions.show', [$permissionId]);
        } else {
            flash()->error('Error!', "You didn't select any roles!");

            return redirect()->route('admin.permissions.show', [$permissionId]);
        }
    }
}
