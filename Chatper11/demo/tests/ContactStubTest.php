<?php

use PHPUnit\Framework\TestCase;

class ContactStubTest extends TestCase
{
    /** @test */
    public function willStubContact()
    {
        $stub = $this->createStub(App\ContactStub::class);

        $stub->method('getContact')
             ->willReturn('Joe Bloggs');

        $this->assertEquals('Joe Bloggs', $stub->getContact());
    }
}