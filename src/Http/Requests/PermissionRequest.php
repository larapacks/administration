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
        $rules = [
            'label' => 'required|max:250',
        ];

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
        $permission->label = $this->label;

        return $permission->save();
    }
}
