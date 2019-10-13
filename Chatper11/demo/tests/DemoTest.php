<?php

use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    public function testIsTheSame()
    {
       $hasValue = true;
        $this->assertSame(true, $hasValue);
    }
}
