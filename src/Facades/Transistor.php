<?php

namespace Ypl\Transistor\Facades;

use Illuminate\Support\Facades\Facade;

class Transistor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Ypl\Transistor\Contracts\Transistor::class;
    }
}
