<?php

namespace Ypl\Transistor\Gateways;

use Ypl\Transistor\Contracts\Gateway;

class TwilioGateway implements Gateway
{
    /**
     * TwilioGateway constructor.
     * @param string $fromNumber
     */
    public function __construct(string $fromNumber)
    {

    }

    public function send(string $recipient, string $body)
    {

    }
}
