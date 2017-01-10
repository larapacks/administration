<?php

namespace Larapacks\Administration\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Larapacks\Authorization\Authorization;

class HasAdministratorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Authorization::user();

        $role = Authorization::role();

        try {
            $admin = $user->whereHas('roles', function ($query) use ($role) {
                $query->whereName($role::getAdministratorName());
            })->count();

            if ($admin > 0) {
                return $next($request);
            }
        } catch (QueryException $e) {
            // Looks like our tables haven't been migrated.
            // We'll redirect to our migration setup.
            return redirect()->route('admin.setup.migrations.create');
        }

        // The administrator account hasn't been created.
        // We'll redirect to the setup page.
        return redirect()->route('admin.setup.account.create');
    }
}
