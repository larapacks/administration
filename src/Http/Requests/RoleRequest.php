<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class RoleRequest extends Request
{
    /**
     * The role request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $roles = $this->route('roles');

        $role = Authorization::role()->find($roles);

        $rules = [
            'name'  => "required|unique:roles,name,$roles",
            'label' => 'required',
        ];

        if ($role instanceof Role && $role->isAdministrator()) {
            // If the user is editing an administrator, we need to
            // remove the name validation from the request
            // because they aren't allowed to edit
            // the administrators name.
            unset($rules['name']);
        }

        return $rules;
    }

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
