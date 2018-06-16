<?php

namespace Ypl\Transistor\Tests\Gateways;

use Ypl\Transistor\Contracts\Gateway;
use Ypl\Transistor\Contracts\Response;

class TestGateway implements Gateway
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    protected $fromNumber;

    /**
     * TestGateway constructor.
     * @param array $config
     * @param string $fromNumber
     */
    public function __construct(array $config, string $fromNumber)
    {
        $this->config = $config;
        $this->fromNumber = $fromNumber;
    }

    /**
     * @param string $recipient
     * @param string $body
     * @return Response
     */
    public function send(string $recipient, string $body): Response
    {
        return new TestResponse([
            'id' => str_random(32),
            'to' => $recipient,
            'from' => $this->fromNumber,
            'body' => $body,
        ]);
    }
}
