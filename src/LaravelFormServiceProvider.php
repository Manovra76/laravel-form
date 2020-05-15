<?php

namespace JakubHonisek\LaravelForm;

use Illuminate\Support\ServiceProvider;

class LaravelFormServiceProvider extends ServiceProvider
{
    private $namespace = 'basics';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // config
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-form.php', $this->namespace);

        // publishes
        $this->publishes([
            __DIR__.'/../config/laravel-form.php' => config_path($this->namespace.'.php'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
