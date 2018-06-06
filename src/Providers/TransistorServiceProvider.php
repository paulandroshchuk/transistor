<?php

namespace Ypl\Transistor\Providers;

use Illuminate\Support\ServiceProvider;
use Ypl\Transistor\Contracts\Transistor;
use Ypl\Transistor\Factory;

class TransistorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/transistor.php' => config_path('transistor.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Transistor::class, function () {
            return new Factory($this->app['config']->get('transistor'));
        });
    }
}

