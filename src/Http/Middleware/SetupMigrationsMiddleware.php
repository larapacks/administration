<?php

namespace Larapacks\Administration\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Larapacks\Authorization\Authorization;

class SetupMigrationsMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Schema::hasTable(Authorization::role()->getTable())) {
                // Looks like we've already ran migrations. We'll redirect
                // the user to the administrator account creation page.
                return redirect()->route('admin.setup.account.create');
            }
        } catch (Exception $e) {
            // We'll catch the query exception in case the
            // settings table hasn't been migrated, or
            // we can't connect to our database.
        }

        // Migrations haven't been setup. Allow the user to run them.
        return $next($request);
    }
}
