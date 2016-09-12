<?php

namespace Larapacks\Administration;

use Illuminate\Support\ServiceProvider;
use Laracasts\Flash\FlashServiceProvider;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(FlashServiceProvider::class);
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        // Load our views.
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        // Our configuration file.
        $config = __DIR__.'/Config/config.php';

        // Our views directory.
        $views = __DIR__.'/../resources/views';

        $this->publishes([
            $config => config_path('admin.php'),
            $views => resource_path('views/vendor/administration')
        ], 'admin');

        // We'll merge the configuration in case of updates.
        $this->mergeConfigFrom($config, 'admin');
    }
}
