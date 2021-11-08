<?php

namespace Codedcell\ViewCreator;

use Codedcell\ViewCreator\View\Components\Input;
use Codedcell\ViewCreator\Console\CreateForm;
use Codedcell\ViewCreator\View\Components\Checkbox;
use Codedcell\ViewCreator\View\Components\Date;
use Codedcell\ViewCreator\View\Components\Password;
use Codedcell\ViewCreator\View\Components\Radio;
use Codedcell\ViewCreator\View\Components\Select;
use Codedcell\ViewCreator\View\Components\Textarea;
use Illuminate\Support\ServiceProvider;

class ViewCreatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'view-creator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'view-creator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('view-creator.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/view-creator'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/view-creator'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/view-creator'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([CreateForm::class]);
        }
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'viewcreator');
        $this->loadViewComponentsAs('viewcreator', [
            Input::class,
            Checkbox::class,
            Date::class,
            Password::class,
            Radio::class,
            Select::class,
            Textarea::class
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'view-creator');

        // Register the main class to use with the facade
        $this->app->singleton('view-creator', function () {
            return new ViewCreator;
        });
    }
}
