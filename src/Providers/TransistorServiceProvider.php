<?php

namespace Ypl\Transistor\Providers;

use Illuminate\Support\ServiceProvider;
use Ypl\Transistor\Contracts\Transistor;
use Ypl\Transistor\Factory;
use Ypl\Transistor\Gateways\TwilioGateway;

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

        $this->app[Transistor::class]->extend('twilio', function (string $fromNumber) {
            return new TwilioGateway($this->app['config']->get('transistor.twilio'), $fromNumber);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Transistor::class, function () {
            return new Factory();
        });
    }
}

