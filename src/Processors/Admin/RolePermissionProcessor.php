<?php

namespace Larapacks\Administration\Processors\Admin;

use Larapacks\Administration\Http\Requests\Admin\RolePermissionRequest;
use Larapacks\Administration\Models\Permission;
use Larapacks\Administration\Models\Role;
use Larapacks\Administration\Processors\Processor;

class RolePermissionProcessor extends Processor
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * @var Permission
     */
    protected $permission;

    /**
     * Constructor.
     *
     * @param Role       $role
     * @param Permission $permission
     */
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Adds the requested permissions to the specified role.
     *
     * @param RolePermissionRequest $request
     * @param int|string            $roleId
     *
     * @return array|false
     */
    public function store(RolePermissionRequest $request, $roleId)
    {
        $this->authorize('admin.roles.permissions.store');

        $role = $this->role->findOrFail($roleId);

        $permissions = $request->input('permissions', []);

        if (count($permissions) > 0) {
            $permissions = $this->permission->findMany($permissions);

            return $role->permissions()->saveMany($permissions);
        }

        return false;
    }

    /**
     * Removes the specified permission from the specified role.
     *
     * @param int|string $roleId
     * @param int|string $permissionId
     *
     * @return int
     */
    public function destroy($roleId, $permissionId)
    {
        $this->authorize('admin.roles.permissions.destroy');

        $role = $this->role->findOrFail($roleId);

        $permission = $role->permissions()->findOrFail($permissionId);

        return $role->permissions()->detach($permission);
    }
}
