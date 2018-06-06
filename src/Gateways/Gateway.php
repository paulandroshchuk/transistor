<?php

namespace Ypl\Transistor\Gateways;

interface Gateway
{
    public function send(string $recipient, string $body);
}
