<?php

namespace Ypl\Transistor;

use Ypl\Transistor\Contracts\Gateway;
use Ypl\Transistor\Contracts\Transistor;
use Ypl\Transistor\Exceptions\NoGatewayFoundException;

class Factory implements Transistor
{
    /**
     * A list of gateways.
     *
     * @var array
     */
    protected static $gateways = [];

    /**
     * Set a Gateway into the Transistor.
     *
     * @param $gateway
     * @param $number
     * @return Gateway
     * @throws NoGatewayFoundException
     */
    public function from(string $gateway, string $number): Gateway
    {
        if (static::hasGateway($gateway)) {
            return static::getGateway($gateway, $number);
        }

        throw new NoGatewayFoundException();
    }

    /**
     * Determine whether Transistor has a gateway or no.
     *
     * @param string $name
     * @return bool
     */
    public static function hasGateway(string $name): bool
    {
        return isset(static::$gateways[$name]);
    }

    /**
     * Get a gateway by a given name.
     *
     * @param string $name
     * @param $number
     * @return Gateway
     */
    protected static function getGateway(string $name, $number): Gateway
    {
        return call_user_func(static::$gateways[$name], $number);
    }

    /**
     * Extend Transistor with a new gateway.
     *
     * @param string $gatewayName
     * @param callable $gateway
     * @throws \Exception
     */
    public static function extend(string $gatewayName, callable $gateway)
    {
        if (strlen(str_replace(' ', '', $gatewayName)) < 1) {
            throw new \Exception('Gateway name is invalid.');
        }

        static::$gateways[$gatewayName] = $gateway;
    }

    /**
     * Get a list of available gateways.
     *
     * @return array
     */
    public static function getAvailableGateways(): array
    {
        return array_keys(static::$gateways);
    }
}
