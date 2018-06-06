<?php

namespace Ypl\Transistor\Gateways;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Ypl\Transistor\Contracts\Gateway;
use Ypl\Transistor\Responses\TwilioResponse;

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
     * @param string $text
     * @return TwilioResponse
     */
    public function send(string $recipient, string $text)
    {
        $formParams = [
            'Body' => $text,
            'To' => $recipient,
            'From' => $this->fromNumber
        ];
        $body = http_build_query($formParams);

        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());
        $client = new Client([
            'handler' => $stack,
            'timeout' => 5,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Content-Length' => strlen($body),
            ],
            'auth' => [
                array_get($this->config, 'gateways.twilio.sid'),
                array_get($this->config, 'gateways.twilio.auth_token'),
            ],
            'curl' => [
                CURLOPT_RETURNTRANSFER => true,
            ],
        ]);

        $url = sprintf('https://api.twilio.com/2010-04-01/Accounts/%s/Messages.json', array_get($this->config, 'gateways.twilio.sid'));

        $response = $client->post($url, [
            'form_params' => $formParams
        ]);

        return new TwilioResponse($response);
    }
}
