<?php

namespace Ypl\Transistor\Integration\Twilio;

class SendMessageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Ypl\Transistor\Gateways\TwilioGateway
     */
    protected $gateway;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    function setUp()
    {
        parent::setUp();

        $this->gateway = new \Ypl\Transistor\Gateways\TwilioGateway([
            'gateways.twilio.sid' => '',
            'gateways.twilio.auth_token' => '',
        ], '+15005550006');
    }

    /** @test */
    function can_send_a_message()
    {
        $response = $this->gateway->send('+15005552338', 'test message');

        $this->assertEquals(34, strlen($response->getId())); // Assert that the response has correct twilio sid.
        $this->assertEquals('test message', $response->getMessageBody());
        $this->assertEquals('+15005550006', $response->getSenderNumber());
        $this->assertEquals('+15005552338', $response->getRecipientNumber());
    }
}
