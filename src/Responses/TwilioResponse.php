<?php

namespace Ypl\Transistor\Responses;

use Psr\Http\Message\ResponseInterface;
use Ypl\Transistor\Contracts\Response;
use Ypl\Transistor\Exceptions\InvalidResponseException;

class TwilioResponse implements Response
{
    /**
     * Decoded Twilio Response.
     *
     * @var array
     */
    protected $decodedResponse;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * TwilioResponse constructor.
     * @param ResponseInterface $response
     * @throws InvalidResponseException
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->decodedResponse = json_decode($response->getBody(), true);

        $this->validateResponse();
    }

    /**
     * Make sure that the valid response is returned.
     *
     * @throws InvalidResponseException
     */
    protected function validateResponse()
    {
        $decodedResponse = $this->getDecodedResponse();

        if (! isset($decodedResponse['sid'])
            || ! isset($decodedResponse['to'])
            || ! isset($decodedResponse['from'])
            || ! isset($decodedResponse['body']))
        {
            throw new InvalidResponseException($this->getBaseResponse());
        }
    }

    /**
     * Get base response.
     *
     * @return mixed
     */
    public function getBaseResponse(): \GuzzleHttp\Psr7\Response
    {
        return $this->response;
    }

    /**
     * Returns decoded response.
     *
     * @return array|mixed
     */
    public function getDecodedResponse()
    {
        return $this->decodedResponse;
    }

    /**
     * Get an ID of Response.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->getDecodedResponse()['sid'];
    }

    /**
     * Get recipient number.
     *
     * @return string
     */
    public function getRecipientNumber(): string
    {
        return $this->getDecodedResponse()['to'];
    }

    /**
     * Get sender number.
     *
     * @return string
     */
    public function getSenderNumber(): string
    {
        return $this->getDecodedResponse()['from'];
    }

    /**
     * Get Message Text.
     *
     * @return string
     */
    public function getMessageBody(): string
    {
        return $this->getDecodedResponse()['body'];
    }
}
