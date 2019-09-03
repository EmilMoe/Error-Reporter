<?php

namespace EmilMoe\ErrorReporter;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            ExceptionHandler::class,
            Handler::class
        );

        $this->publishes([
            __DIR__ . '/config.php' => config_path('error-reporter.php')
        ], 'config');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'error-reporter'
        );
    }
}
