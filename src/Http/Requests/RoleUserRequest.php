<?php

namespace Larapacks\Administration\Http\Requests;

class RoleUserRequest extends Request
{
    /**
     * Allows all users to add users to roles.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * The role user request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users.*' => 'exists:users,id',
        ];
    }
}
