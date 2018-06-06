<?php

namespace Ypl\Transistor\Gateways;

use GuzzleHttp\Client;
use Ypl\Transistor\Contracts\Gateway;

class TwilioGateway implements Gateway
{
    /**
     * @var string
     */
    protected $fromNumber;

    /**
     * @var array
     */
    protected $config;

    /**
     * TwilioGateway constructor.
     * @param string $fromNumber
     * @param array $config
     */
    public function __construct(array $config, string $fromNumber)
    {
        $this->config = $config;
        $this->fromNumber = $fromNumber;
    }

    /**
     * Send Message to Recipient.
     *
     * @param string $recipient
     * @param string $body
     */
    public function send(string $recipient, string $body)
    {

    }
}
