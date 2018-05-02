<?php

namespace Ypl\Transistor\Providers;

use Illuminate\Support\ServiceProvider;
use Ypl\Transistor\Transistor;
use Ypl\Transistor\TransistorFactory;

class TransistorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Transistor::class, TransistorFactory::class);
    }
}

