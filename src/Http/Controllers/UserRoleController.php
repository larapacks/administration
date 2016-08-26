<?php

namespace Larapacks\Administration\Http\Controllers;

use Larapacks\Administration\Http\Requests\UserRoleRequest;

class UserRoleController extends Controller
{
    public function store(UserRoleRequest $request, $userId)
    {

    }

    public function destroy($userId, $permissionId)
    {
        //
    }
}
