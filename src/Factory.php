<?php

namespace Ypl\Transistor;

use Ypl\Transistor\Exceptions\NoGatewayFoundException;
use Ypl\Transistor\Gateways\Gateway;
use Ypl\Transistor\Gateways\TwilioGateway;

class Factory implements Transistor
{
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
        if ($gateway === 'twilio') {
            return new TwilioGateway($number);
        }

        throw new NoGatewayFoundException();
    }
}
