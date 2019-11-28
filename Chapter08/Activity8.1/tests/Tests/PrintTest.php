<?php


namespace Tests;

use PHPUnit\Framework\TestCase;

class PrintTest extends TestCase
{
    public function testPrintEmpty()
    {
        $message = '';
        $this->expectOutputString("(!) $message\n");
        printError($message);
    }

    public function testPrintHello()
    {
        $message = 'Hello';
        $this->expectOutputString("(!) $message\n");
        printError($message);
    }

    public function testPrintThrowException()
    {
        $message = [];
        $this->expectException(\TypeError::class);
        printError($message);
    }
}
