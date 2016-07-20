<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Larapacks\Authorization\Authorization;

class SetupRequest extends Request
{
    /**
     * The setup request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|min:2',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

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
