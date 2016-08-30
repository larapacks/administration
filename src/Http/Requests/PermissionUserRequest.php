<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class PermissionUserRequest extends Request
{
    /**
     * Allows all users to add permissions to users.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
     * Persist the changes to the model.
     *
     * @param \Illuminate\Database\Eloquent\Model $permission
     *
     * @return bool
     */
    public function persist(Model $permission)
    {
        $users = $this->input('users', []);

        if (count($users) > 0) {
            $users = Authorization::user()->findMany($users);

            return $permission->users()->saveMany($users);
        }

        return false;
    }
}
