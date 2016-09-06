<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Authorization\Authorization;
use Larapacks\Administration\Http\Requests\UserPermissionRequest;

class UserPermissionController extends Controller
{
    /**
     * Adds the requested permissions to the specified user.
     *
     * @param UserPermissionRequest $request
     * @param int|string            $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserPermissionRequest $request, $userId)
    {
        $this->authorize('admin.users.permissions.store');

        $user = Authorization::user()->findOrFail($userId);

        if ($request->persist($user)) {
            flash()->success('Successfully added permissions to user.');
        } else {
            flash()->error("You didn't select any permissions.");
        }

        return redirect()->back();
    }

    /**
     * Removes the specified permission from the specified user.
     *
     * @param int|string $userId
     * @param int|string $permissionId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userId, $permissionId)
    {
        $this->authorize('admin.users.permissions.destroy');

        $user = Authorization::user()->findOrFail($userId);

        $permission = $user->permissions()->findOrFail($permissionId);

        if ($user->permissions()->detach($permission)) {
            flash()->success('Successfully removed permission from user.');
        } else {
            flash()->error('There was an issue removing this permission. Please try again.');
        }

        return redirect()->back();
    }
}
