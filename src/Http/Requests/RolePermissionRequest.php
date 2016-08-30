<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;

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

    public function persist(Model $role)
    {
        //
    }
}
