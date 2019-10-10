<?php

namespace Tests;

use Handlers\Handler;
use Handlers\Logout;
use Handlers\Profile;
use PHPUnit\Framework\TestCase;

class HandlerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testHandler()
    {
        $handler = new class extends Handler
        {
            public function handle(): string
            {
                return 'abc';
            }
        };

        $this->assertFalse($handler->willRedirect());
        $handler->requestRedirect('/some-uri');
        $this->assertTrue($handler->willRedirect());
        $this->assertSame('abc', $handler->handle());
    }

    /**
     * @runInSeparateProcess
     */
    public function testLogout()
    {
        $handler = new Logout();
        $handler->handle();
        $this->assertTrue($handler->willRedirect());
    }

    public function testProfileHandler()
    {
        $handler = new Profile();
        $this->assertSame('Profile - Learning PHP', $handler->getTitle());
    }
}