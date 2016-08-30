<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class UserRoleRequest extends Request
{
    /**
     * Allows users to add roles to other users.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * The user role validation rules.
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
     * Persist the changes.
     *
     * @param \Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function persist(Model $user)
    {
        $roles = Authorization::role()->findMany($this->input('roles', []));

        if ($roles->count() > 0 && $user->roles()->saveMany($roles)) {
            return true;
        }

        return false;
    }
}
