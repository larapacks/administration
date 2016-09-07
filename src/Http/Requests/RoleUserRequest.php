<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

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

    /**
     * Persist the changes.
     *
     * @param \Illuminate\Database\Eloquent\Model $role
     *
     * @return bool
     */
    public function persist(Model $role)
    {
        $users = $this->input('users', []);

        if (count($users) > 0) {
            $users = Authorization::user()->findMany($users);

            return $role->users()->saveMany($users);
        }

        return false;
    }
}
