<?php

namespace Ypl\Transistor\Contracts;

interface Gateway
{
    /**
     * Send a text message from a gateway.
     *
     * @param string $recipient
     * @param string $body
     * @return Response
     */
    public function send(string $recipient, string $body): Response;
}
