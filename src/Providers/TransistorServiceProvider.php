<?php

namespace Ypl\Transistor\Providers;

use Illuminate\Support\ServiceProvider;
use Ypl\Transistor\Transistor;
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
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Transistor::class, Factory::class);
    }
}

