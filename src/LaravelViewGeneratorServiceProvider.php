<?php

namespace Kakposoe\LaravelViewGenerator;

use Illuminate\Support\ServiceProvider;
use Kakposoe\LaravelViewGenerator\Commands\CreateViewFile;

class LaravelViewGeneratorServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../config/laravel-view-generator.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('laravel-view-generator.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateViewFile::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'laravel-view-generator'
        );

        $this->app->bind('laravel-view-generator', function () {
            return new LaravelViewGenerator();
        });
    }
}
