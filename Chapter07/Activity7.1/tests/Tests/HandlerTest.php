<?php

namespace Tests;

use Handlers\Handler;
use Handlers\Logout;
use Handlers\Profile;
use PHPUnit\Framework\TestCase;

class HandlerTest extends TestCase
{
    public function testHandlerResponse()
    {
        $handler = new class extends Handler
        {
            public function handle(): string
            {
                return 'abc';
            }
        };

        $this->assertSame('abc', $handler->handle());
    }

    /**
     * @runInSeparateProcess
     */
    public function testHandlerRedirect()
    {
        $handler = new class extends Handler
        {
            public function handle(): string
            {
                return '';
            }
        };

        $this->assertFalse($handler->willRedirect());
        $handler->requestRedirect('/some-uri');
        $this->assertTrue($handler->willRedirect());
    }

    /**
     * @runInSeparateProcess
     */
    public function testHandlerRefresh()
    {
        $handler = new class extends Handler
        {
            public function handle(): string
            {
                return '';
            }
        };

        // test refresh
        $_SERVER['REQUEST_URI'] = '/';
        $this->assertFalse($handler->willRedirect());
        $handler->requestRefresh();
        $this->assertTrue($handler->willRedirect());
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

    /**
     * @runInSeparateProcess
     */
    public function testProfileHandler()
    {
        $handler = new Profile();
        $this->assertSame('Profile - Contacts list', $handler->getTitle());
    }
}
