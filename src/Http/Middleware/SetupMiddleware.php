<?php

namespace Larapacks\Administration\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Larapacks\Authorization\Authorization;

class SetupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Authorization::role();

        // Retrieve the administrator role.
        $admin = $role->whereName($role::getAdministratorName())->first();

        // Retrieve the count of users.
        $users = Authorization::user()->count();

        if ($admin instanceof $role && !$request->user() && $users === 0) {
            // If the administrator role has been created, no user
            // is logged in, and no users exist,
            // we'll allow the setup request.
            return $next($request);
        }

        // If the administrator role hasn't already been created,
        // we'll throw an Unauthorized Exception.
        abort(403, 'Unauthorized');
    }
}
