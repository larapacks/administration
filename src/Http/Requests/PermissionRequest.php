<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;

class PermissionRequest extends Request
{
    /**
     * Allows all users to create / edit permissions.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * The permission request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $permissions = $this->route('permission');

        $rules = [
            'name'  => 'required|max:250',
            'label' => 'required|max:250',
        ];

        if ($this->method() === 'PATCH') {
            $rules['name'] = "required|unique:permissions,name,$permissions|max:250";
        }

        return $rules;
    }

    /**
     * Persist the changes.
     *
     * @param \Illuminate\Database\Eloquent\Model $permission
     *
     * @return bool
     */
    public function persist(Model $permission)
    {
        $permission->name = $this->name;
        $permission->label = $this->label;

        return $permission->save();
    }
}
