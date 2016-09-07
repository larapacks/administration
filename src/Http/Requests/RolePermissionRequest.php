<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class RolePermissionRequest extends Request
{
    /**
     * Allows all users to add permissions to roles.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * The role permission request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    /**
     * Persist the changes.
     *
     * @param \Illuminate\Database\Eloquent\Model $role
     *
     * @return bool
     */
    public function persist(Model $role)
    {
        $permissions = $this->input('permissions', []);

        if (count($permissions) > 0) {
            $permissions = Authorization::permission()->findMany($permissions);

            return $role->permissions()->saveMany($permissions);
        }

        return false;
    }
}
