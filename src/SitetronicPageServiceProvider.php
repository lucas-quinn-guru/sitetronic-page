<?php

namespace LucasQuinnGuru\SitetronicPage;

use Illuminate\Support\ServiceProvider;

class SitetronicPageServiceProvider extends ServiceProvider
{

    protected $commands = [
        'LucasQuinnGuru\SitetronicPage\Commands\SeedRolesAndPermissionsCommand'
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/sitetronic-page.php',
            'sitetronic-page'
        );

        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sitetronic-page');

        $this->publishes([
            __DIR__ . '/../config/sitetronic-page.php' => config_path('sitetronic-page.php'),
        ], 'sitetronic-page-config');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/lucas-quinn-guru/page'),
        ], 'assets');
    }
}
