<?php

namespace Larapacks\Administration\Http\Requests;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Request
{
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
     * The user request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('user');

        $rules = [
            'name'  => 'required|min:2',
            'email' => "required|email|unique:users,email,$user",
        ];

        if ($this->method() === 'PATCH') {
            $rules['password'] = 'confirmed|required_with:password_confirmation';
        } else {
            $rules['password'] = 'required|confirmed';
            $rules['password_confirmation'] = 'required';
        }

        return $rules;
    }

    /**
     * Persist the changes to the model.
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
