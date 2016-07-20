<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Request
{
    /**
     * The user request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('users');

        $rules = [
            'name'  => 'required|min:2',
            'email' => "required|email|unique:users,email,$user",
        ];

        if ($this->route()->getName() === 'admin.users.update') {
            $rules['password'] = 'confirmed';
        } else {
            $rules['password'] = 'required|confirmed';
            $rules['password_confirmation'] = 'required';
        }

        return $rules;
    }

    /**
     * Allows all users to create / edit users.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Persist the model.
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

        return $user->save();
    }
}
