<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Processors\Admin\UserPermissionProcessor;
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
        if ($this->processor->store($request, $userId)) {
            flash()->success('Success!', 'Successfully added permissions.');

            return redirect()->route('admin.users.show', [$userId]);
        } else {
            flash()->error('Error!', "You didn't select any permissions.");

            return redirect()->route('admin.users.show', [$userId]);
        }
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
        if ($this->processor->destroy($userId, $permissionId)) {
            flash()->success('Success!', 'Successfully removed permission.');

            return redirect()->route('admin.users.show', [$userId]);
        } else {
            flash()->error('Error!', 'There was an issue removing this permission. Please try again.');

            return redirect()->route('admin.users.show', [$userId]);
        }
    }
}
