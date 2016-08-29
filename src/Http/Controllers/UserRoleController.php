<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\UserRoleRequest;
use Larapacks\Authorization\Authorization;

class UserRoleController extends Controller
{
    /**
     * Adds roles to the specified user.
     *
     * @param UserRoleRequest $request
     * @param int             $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRoleRequest $request, $userId)
    {
        $this->authorize('admin.roles.users.store');

        $user = Authorization::user()->findOrFail($userId);

        if ($request->persist($user)) {
            flash()->success('Success!', 'Successfully added roles.');

            return redirect()->route('admin.users.show', [$userId]);
        }

        flash()->error('Error!', "You didn't select any roles.");

        return redirect()->route('admin.users.show', [$userId]);
    }

    /**
     * Removes the specified role from the specified user.
     *
     * @param int $userId
     * @param int $roleId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userId, $roleId)
    {
        $this->authorize('admin.roles.users.destroy');

        $user = Authorization::user()->findOrFail($userId);

        $role = $user->roles()->findOrFail($roleId);

        // If the user is an administrator and the role being removed is an
        // administrator role, we need to verify that there are other
        // administrators in the system before allowing the removal.
        if ($user->isAdministrator() && $role->isAdministrator()) {
            // We'll grab all users that are administrators.
            $users = Authorization::user()->whereHas('roles', function ($q) use ($role) {
                return $q->whereName($role->name);
            })->count();

            if ($users <= 1) {
                flash()->error('Error', 'You cannot remove the administrator role. This account is the only administrator.');

                return redirect()->route('admin.users.show', [$userId]);
            }
        }

        if ($user->permissions()->detach($role)) {
            flash()->success('Success!', 'Successfully removed role.');

            return redirect()->route('admin.users.show', [$userId]);
        }

        flash()->error('Error!', 'There was an issue removing this role. Please try again.');

        return redirect()->route('admin.users.show', [$userId]);
    }
}
