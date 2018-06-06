<?php

class FromTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Ypl\Transistor\Transistor
     */
    protected $transistor;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    function setUp()
    {
        parent::setUp();

        $this->transistor = new \Ypl\Transistor\Factory();
    }

    /** @test */
    function no_gateway_exception_is_thrown_using_a_wrong_name()
    {
        $this->expectException(\Ypl\Transistor\Exceptions\NoGatewayFoundException::class);

        $this->transistor->from('wrong-name', '+120000000');
    }

    /** @test */
    function returns_right_twilio_gateway()
    {
        $twilio = $this->transistor->from('twilio', '+120000000');

        $this->assertInstanceOf(\Ypl\Transistor\Gateways\TwilioGateway::class, $twilio);
    }
}
