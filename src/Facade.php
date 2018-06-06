<?php

namespace Ypl\Transistor;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \Ypl\Transistor\Contracts\Transistor::class;
    }
}