<?php

namespace Larapacks\Administration\Http\Requests;

class PermissionUserRequest extends Request
{
    /**
     * The permission user request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users.*' => 'exists:users,id',
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
