<?php

namespace JakubHonisek\LaravelForm;

use Illuminate\Support\ServiceProvider;

class LaravelFormServiceProvider extends ServiceProvider
{
    private $namespace = 'laravel-form';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // config
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-form.php', $this->namespace);

        // views
        $this->loadViewsFrom(__DIR__.'/views/', $this->namespace);

        // publishes
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/'.$this->namespace),
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
