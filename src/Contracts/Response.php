<?php

namespace Ypl\Transistor\Contracts;

interface Response
{
    public function getId(): string;

    public function getRecipientNumber(): string;

    public function getSenderNumber(): string;

    public function getMessageBody(): string;
}
