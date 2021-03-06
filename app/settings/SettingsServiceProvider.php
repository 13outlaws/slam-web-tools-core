<?php

namespace SlamWebTools;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app['settings'] = $this->app->share(function($app)
        {
            return new \SlamWebTools\Settings;
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Settings', 'SlamWebTools\Facades\Settings');
        });

    }
}