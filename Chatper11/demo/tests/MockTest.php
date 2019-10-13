<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    /** @test */
    public function willCallDeleteMethodOnBooksClasss()
    {
        $mock = $this->getMockBuilder('Books')
            ->setMethods(['delete'])
            ->getMock();

        $mock->expects($this->once())
            ->method('delete')
            ->with(
               $this->greaterThan(0)
            );

        $mock->delete(3);
    }
}