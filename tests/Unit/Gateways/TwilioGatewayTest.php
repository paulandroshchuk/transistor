<?php

namespace Ypl\Transistor\Tests\Unit\Gateways;

use Ypl\Transistor\Exceptions\NoApiKeyProvidedException;
use Ypl\Transistor\Gateways\TwilioGateway;
use Ypl\Transistor\Tests\TestCase;

class TwilioGatewayTest extends TestCase
{
    /** @test */
    function throws_NoApiKeyProvidedException_when_empty_config_provided()
    {
        $this->expectException(NoApiKeyProvidedException::class);

        new TwilioGateway([], '');
    }

    /** @test */
    function throws_NoApiKeyProvidedException_when_no_sid_key_provided()
    {
        $this->expectException(NoApiKeyProvidedException::class);

        new TwilioGateway(['sid' => null, 'auth_token' => 'blabla'], '');
    }

    /** @test */
    function throws_NoApiKeyProvidedException_when_no_auth_token_provided()
    {
        $this->expectException(NoApiKeyProvidedException::class);

        new TwilioGateway(['sid' => 'blabla', 'auth_token' => null], '');
    }

    /** @test */
    function does_not_throw_any_errors_when_the_right_config_provided()
    {
        $gateway = new TwilioGateway(['sid' => 'blabla', 'auth_token' => 'auth_token'], '');

        $this->assertInstanceOf(TwilioGateway::class, $gateway);
    }
}
