<?php

use PHPUnit\Framework\TestCase;
use App\Order;

class OrderTest extends TestCase
{
    /** @test */
    public function CanCharge()
    {
        $order = new Order();
        $expected = 10;
        $actual = $order->charge(10, 'Stripe');

        $this->assertEquals($expected, $actual);
    }
}