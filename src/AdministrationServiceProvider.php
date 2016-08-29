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
        $this->bootConfig();

        $this->registerRoutes();

        $this->loadViews();
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
    public function bootConfig()
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
    public function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');
    }
}
