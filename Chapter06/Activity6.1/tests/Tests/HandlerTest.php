<?php

namespace Tests;

use Handlers\Handler;
use Handlers\Login;
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

    /**
     * @runInSeparateProcess
     */
    public function testProfileHandler()
    {
        $handler = new Profile();
        $this->assertSame('Profile - Learning PHP', $handler->getTitle());

        // test sent form today
        $hasSentFormToday = \Closure::bind(function (array $data) use ($handler) {
            return $handler->hasSentFormToday($data);
        }, $handler, $handler);
        $this->assertTrue($hasSentFormToday([['dateAdded' => date('Y-m-d')]]));
        $this->assertFalse($hasSentFormToday([['dateAdded' => date('Y-m-d', time() - 24 * 60 * 60)]]));

        // test refresh
        $_SERVER['REQUEST_URI'] = '/';
        $requestRefresh = function () use ($handler) {
            $handler->requestRefresh();
        };
        $requestRefresh->call($handler);
        $this->assertTrue($handler->willRedirect());
    }

    public function testLoginHandler()
    {
        $handler = new Login();
        $getUserData = function (string $username) use ($handler) {
            return $handler->getUserData($username);
        };
        $vipUser = $getUserData->call($handler, 'vip');
        $this->assertSame('VIP', $vipUser['level'] ?? null);
    }
}