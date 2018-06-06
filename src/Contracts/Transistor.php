<?php

namespace Ypl\Transistor\Contracts;

interface Transistor
{
    /**
     * Setup a Gateway into the Transistor.
     *
     * @param $gateway
     * @param $number
     * @return Gateway
     */
    public function from(string $gateway, string $number): Gateway;
}
