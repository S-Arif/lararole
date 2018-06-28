<?php

namespace Ge\Lararole;

use Illuminate\Support\ServiceProvider;

class LararoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'lararole');
        $this->loadMigrationsFrom(__DIR__ .'/database/migrations');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/lararole'),
        ], 'views');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'migration');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
