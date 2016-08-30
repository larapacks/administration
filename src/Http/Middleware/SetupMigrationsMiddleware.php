<?php

namespace Larapacks\Administration\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SetupMigrationsMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Schema::hasTable('users')) {
            // If the current application doesn't have a users
            // table, we haven't ran migrations yet.
            return $next($request);
        }

        // Looks like we've already ran migrations. We'll redirect
        // the user to the administrator account creation page.
        return redirect()->route('admin.setup.account.create');
    }
}
