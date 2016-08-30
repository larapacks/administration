<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class PermissionRoleRequest extends Request
{
    /**
     * The permission role request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roles.*' => 'exists:roles,id',
        ];
    }

    /**
     * Allows all users to add roles to permissions.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Persist the changes to the model.
     *
     * @param \Illuminate\Database\Eloquent\Model $permission
     *
     * @return bool
     */
    public function persist(Model $permission)
    {
        $roles = $this->input('roles', []);

        if (count($roles) > 0) {
            $roles = Authorization::role()->findMany($roles);

            return $permission->roles()->saveMany($roles);
        }

        return false;
    }
}
