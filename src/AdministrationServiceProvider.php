<?php

namespace Larapacks\Administration;

use Illuminate\Support\ServiceProvider;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

    /**
     * Registers the administration configuration file.
     *
     * @return void
     */
    public function registerConfig()
    {
        $config = __DIR__.'/Config/config.php';

        // Set the configuration file to be publishable.
        $this->publishes([
            $config => config_path('admin.php'),
        ], 'admin');

        // We'll merge the configuration in case of updates.
        $this->mergeConfigFrom($config, 'admin');
    }

    /**
     * Registers the administration routes.
     *
     * @return void
     */
    public function registerRoutes()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Registers the administration views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');
    }
}
