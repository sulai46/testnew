<?php

namespace Chillout\CrudGenerator;

use Illuminate\Support\ServiceProvider;
use Chillout\CrudGenerator\App\Console\Commands\CrudGeneratorCommand;
class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'crud-generator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'crud-generator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('crud-generator.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/crud-generator'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/crud-generator'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/crud-generator'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([CrudGeneratorCommand::class]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'crud-generator');

        // Register the main class to use with the facade
        $this->app->singleton('crud-generator', function () {
            return new CrudGenerator;
        });
    }
}
