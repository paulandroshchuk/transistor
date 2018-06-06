<?php

namespace Ypl\Transistor\Contracts;

interface Gateway
{
    public function send(string $recipient, string $body);
}
