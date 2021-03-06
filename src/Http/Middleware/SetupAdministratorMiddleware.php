<?php

namespace Larapacks\Administration\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\UnauthorizedException;
use Larapacks\Authorization\Authorization;

class SetupAdministratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @throws UnauthorizedException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Authorization::role();

        try {
            // Retrieve the administrator role.
            $admin = $role->whereName($role::getAdministratorName())->first();

            // Retrieve the count of users.
            $users = Authorization::user()->count();

            if ($admin instanceof $role && !$request->user() && $users === 0) {
                // If the administrator role has been created, no
                // user is logged in, and no users exist,
                // we'll allow the setup request.
                return $next($request);
            }
        } catch (QueryException $e) {
            // Looks like our tables haven't been migrated.
            // We'll redirect to our migration setup.
            return redirect()->route('admin.setup.migrations.create');
        }

        // If the administrator role hasn't already been created,
        // we'll throw an Unauthorized Exception.
        throw new UnauthorizedException("An administrator account already exists.");
    }
}
