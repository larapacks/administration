<?php

namespace Larapacks\Administration\Http\Requests;

class UserPermissionRequest extends Request
{
    /**
     * The user permission request validation rules.
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
     * Allows all users to add permissions to users.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
