<?php

namespace Larapacks\Administration;

use Illuminate\Routing\Router;
use Larapacks\Authorization\Middleware\RoleMiddleware;
use Larapacks\Authorization\Middleware\PermissionMiddleware;
use Larapacks\Administration\Http\Middleware\AuthMiddleware;
use Larapacks\Administration\Http\Middleware\SetupMigrationsMiddleware;
use Larapacks\Administration\Http\Middleware\HasAdministratorMiddleware;
use Larapacks\Administration\Http\Middleware\SetupAdministratorMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to all of the controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Larapacks\Administration\Http\Controllers';

    /**
     * Defines the routes for the application.
     *
     * @param Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        $router->middleware('admin.auth', AuthMiddleware::class)
            ->middleware('admin.setup.migrations', SetupMigrationsMiddleware::class)
            ->middleware('admin.setup.account', SetupAdministratorMiddleware::class)
            ->middleware('admin.has-administrator', HasAdministratorMiddleware::class)
            ->middleware('permission', PermissionMiddleware::class)
            ->middleware('role', RoleMiddleware::class);
    }

    /**
     * Defines the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param Router $router
     *
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'middleware'    => config('admin.middleware', 'web'),
            'namespace'     => $this->namespace,
            'prefix'        => config('admin.prefix', 'admin')
        ], function () {
            require __DIR__.'/Http/routes.php';
        });
    }
}
