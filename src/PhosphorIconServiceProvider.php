<?php

namespace Juiko\PhosphorIcon;

use Juiko\PhosphorIcon\PhosphorIconService;
use Juiko\PhosphorIcon\Console\PhosphorIconImport;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PhosphorIconServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->app->bind('phosphoriconservice', function () {
            return new PhosphorIconService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PhosphorIconImport::class,
            ]);
            $this->publishes([
                __DIR__.'/../src/View/Components/PhosphorIconUtils.jsx' => resource_path('js/Components/PhosphorIconUtils.jsx'),
            ], 'public');
        }
    }
}
