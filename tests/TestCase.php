<?php

namespace Ypl\Transistor\Tests;

use Ypl\Transistor\Factory;
use Ypl\Transistor\Gateways\TwilioGateway;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        parent::setUp();

        Factory::extend('twilio', function (string $fromNumber) {
            return new TwilioGateway(['sid' => 'sid', 'auth_token' => 'token'], $fromNumber);
        });
    }
}
