<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class SetupRequest extends Request
{
    /**
     * Allows all users to complete setup.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * The setup request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|min:2|max:250',
            'email'                 => 'required|email|max:250',
            'password'              => 'required|confirmed|max:250',
            'password_confirmation' => 'required|max:250',
        ];
    }

    /**
     * Persists the specified model.
     *
     * @param \Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function persist(Model $user)
    {
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $user->hasSetMutator('password') ? $this->password : bcrypt($this->password);

        $role = Authorization::role();

        $admin = $role->whereName($role::getAdministratorName())->firstOrFail();

        if ($user->save()) {
            $user->assignRole($admin);

            return true;
        }

        return false;
    }
}
