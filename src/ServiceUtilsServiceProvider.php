<?php

namespace Diegoalvarezb\ServiceUtils;

use Illuminate\Support\ServiceProvider;

/**
 * Service utils service provider.
 *
 * @package Diegoalvarezb\ServiceUtils
 */
class ServiceUtilsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish config files
        $this->publishes([
            __DIR__ . '/config/service-utils.php' => config_path('service-utils.php'),
        ], 'service-utils');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
