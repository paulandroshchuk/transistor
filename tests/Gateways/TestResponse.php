<?php

namespace Ypl\Transistor\Tests;

use Ypl\Transistor\Contracts\Response;

class TestResponse implements Response
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getRecipientNumber(): string
    {
        return $this->data['to'];
    }

    public function getSenderNumber(): string
    {
        return $this->data['from'];
    }

    public function getMessageBody(): string
    {
        return $this->data['body'];
    }
}
