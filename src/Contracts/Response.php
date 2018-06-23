<?php

namespace Ypl\Transistor\Contracts;

interface Response
{
    /**
     * Get base response.
     *
     * @return mixed
     */
    public function getBaseResponse(): \GuzzleHttp\Psr7\Response;

    /**
     * Get recipient's phone number.
     *
     * @return string
     */
    public function getRecipientNumber(): string;

    /**
     * Get sender's phone number.
     *
     * @return string
     */
    public function getSenderNumber(): string;

    /**
     * Get message body.
     *
     * @return string
     */
    public function getMessageBody(): string;
}
