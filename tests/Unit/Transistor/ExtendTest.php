<?php

namespace Ypl\Transistor\Tests\Unit\Transistor;

use Ypl\Transistor\Factory;
use Ypl\Transistor\Tests\Gateways\TestGateway;

class ExtendTest extends \PHPUnit\Framework\TestCase
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

        $this->transistor = new \Ypl\Transistor\Factory([]);
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
}
