<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class RoleRequest extends Request
{
    /**
     * Allows all users to create / edit roles.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * The role request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $roles = $this->route('role');

        $role = Authorization::role()->find($roles);

        $rules = [
            'name'  => "required|unique:roles,name,$roles",
            'label' => 'required',
        ];

        if ($role instanceof Model && $role->isAdministrator()) {
            // If the user is editing an administrator, we need to
            // prevent them from editing the name of the role.
            $rules['name'] = "in:{$role::getAdministratorName()}";
        }

        return $rules;
    }

    /**
     * Persist the changes to the model.
     *
     * @param \Illuminate\Database\Eloquent\Model $role
     *
     * @return bool
     */
    public function persist(Model $role)
    {
        if ($role->exists && $role->isAdministrator()) {
            // Don't allow changing the name of the administrator account.
            $name = $role->name;
        } else {
            $name = $this->name;
        }

        $role->name = $name;
        $role->label = $this->label;

        return $role->save();
    }
}
