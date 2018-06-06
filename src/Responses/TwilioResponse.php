<?php

namespace Ypl\Transistor\Responses;

use Psr\Http\Message\ResponseInterface;
use Ypl\Transistor\Contracts\Response;

class TwilioResponse implements Response
{
    /**
     * Decoded Twilio Response.
     *
     * @var array
     */
    protected $decodedResponse;

    /**
     * TwilioResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->decodedResponse = json_decode($response->getBody(), true);
    }

    /**
     * Get an ID of Response.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->decodedResponse['sid'];
    }

    /**
     * Get recipient number.
     *
     * @return string
     */
    public function getRecipientNumber(): string
    {
        return $this->decodedResponse['to'];
    }

    /**
     * Get sender number.
     *
     * @return string
     */
    public function getSenderNumber(): string
    {
        return $this->decodedResponse['from'];
    }

    /**
     * Get Message Text.
     *
     * @return string
     */
    public function getMessageBody(): string
    {
        return $this->decodedResponse['body'];
    }
}
