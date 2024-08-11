<?php

namespace Tuser\Logger;

use Illuminate\Support\ServiceProvider;
use Tuser\Logger\Loggers\Logger;

class LoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('logger', function () {
            return new Logger();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/logger.php', 'logger');
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/logger.php' => config_path('logger.php')
        ], 'logger-config');
    }
}
