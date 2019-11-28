<?php


namespace Tests;

use DecimalNumber;
use NotANumber;
use NumberIsZeroOrNegative;
use PHPUnit\Framework\TestCase;
use TypeError;
use function calculateFactorial;

class FactorialTest extends TestCase
{
    public function testFactorialOf2()
    {
        $this->assertSame(2, calculateFactorial(2));
    }

    public function testFactorialOfString20()
    {
        $this->assertSame(2432902008176640000, calculateFactorial('20'));
    }

    public function testFactorialOf21ThrowsTypeError()
    {
        $this->expectException(TypeError::class);
        calculateFactorial(21);
    }

    public function testFactorialNotANumber()
    {
        $this->expectException(NotANumber::class);
        calculateFactorial('a');
    }

    public function testFactorialDecimalNumber()
    {
        $this->expectException(DecimalNumber::class);
        calculateFactorial(2.2);
    }

    public function testFactorialNumberIsZeroOrNegative()
    {
        $this->expectException(NumberIsZeroOrNegative::class);
        calculateFactorial(-3);
    }
}
