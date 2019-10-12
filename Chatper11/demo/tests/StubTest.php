<?php

use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
    /** @test */
    public function willStubContact()
    {
        $stub = $this->createMock(App\ContactStub::class);

        $stub->method('getContact')
             ->willReturn('Joe Bloggs');

        $this->assertEquals('Joe Bloggs', $stub->getContact());
    }
}