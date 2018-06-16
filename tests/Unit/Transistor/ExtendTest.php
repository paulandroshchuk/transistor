<?php

namespace Ypl\Transistor\Tests\Unit\Transistor;

use Ypl\Transistor\Factory;
use Ypl\Transistor\Gateways\TwilioGateway;
use Ypl\Transistor\Tests\Gateways\TestGateway;
use Ypl\Transistor\Tests\TestCase;

class ExtendTest extends TestCase
{
    /**
     * @var \Ypl\Transistor\Contracts\Transistor
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
    function can_extend_transistor()
    {
        $this->assertEquals(['twilio'], Factory::getAvailableGateways());

        Factory::extend('custom-one', function ($number) {
            return new TestGateway([], $number);
        });

        $this->assertEquals(['twilio', 'custom-one'], Factory::getAvailableGateways());
    }

    /** @test */
    function cannot_extend_with_empty_string()
    {
        $this->expectException('\Exception');

        Factory::extend('', function () {});
    }

    /** @test */
    function cannot_extend_with_empty_string_with_spae()
    {
        $this->expectException('\Exception');

        Factory::extend(' ', function () {});
    }

    /** @test */
    function can_re_extend_transistor_gateway()
    {
        $this->assertInstanceOf(TwilioGateway::class, $this->transistor->from('twilio', '+123'));

        Factory::extend('twilio', function ($fromNumber) {
            return new TestGateway([], $fromNumber);
        });

        $this->assertInstanceOf(TestGateway::class, $this->transistor->from('twilio', '+123'));
    }

    /** @test */
    function cannot_extend_transistor_with_other_gateway_types()
    {
        Factory::extend('invalid', function () {});

        $this->expectException('TypeError');

        $this->transistor->from('invalid', '+123');
    }
}
