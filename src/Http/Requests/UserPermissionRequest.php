<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

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

    /**
     * Persist the changes.
     *
     * @param \Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function persist(Model $user)
    {
        $permissions = Authorization::permission()->findMany($this->input('permissions', []));

        if ($permissions->count() > 0 && $user->permissions()->saveMany($permissions)) {
            return true;
        }

        return false;
    }
}
