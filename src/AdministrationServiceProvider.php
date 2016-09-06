<?php

namespace Larapacks\Administration;

use Illuminate\Support\ServiceProvider;
use Laracasts\Flash\FlashServiceProvider;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
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
     * {@inheritdoc}
     */
    public function register()
    {
        // Register our service providers.
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(FlashServiceProvider::class);

        // Load our views.
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');
    }
}
