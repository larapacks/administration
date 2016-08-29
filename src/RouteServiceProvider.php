<?php

namespace Larapacks\Administration;

use Illuminate\Routing\Router;
use Larapacks\Administration\Http\Middleware\AdminAuthMiddleware;
use Larapacks\Administration\Http\Middleware\SetupMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Larapacks\Administration\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        $router->middleware('admin.setup', SetupMiddleware::class);
        $router->middleware('admin.auth', AdminAuthMiddleware::class);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'middleware'    => 'web',
            'namespace'     => $this->namespace,
            'prefix'        => config('admin.prefix')
        ], function () {
            require __DIR__.'/Http/routes.php';
        });
    }
}
