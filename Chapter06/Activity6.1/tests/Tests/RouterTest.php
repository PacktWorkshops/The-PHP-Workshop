<?php declare(strict_types=1);

namespace Tests;

use Components\Router;
use Handlers\Handler;
use Handlers\Login;
use Handlers\Logout;
use Handlers\Profile;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testGetHandler()
    {
        $router = new Router();

        $_SERVER['PATH_INFO'] = '/';
        $this->assertNull($router->getHandler());

        $_SERVER['PATH_INFO'] = '/profile';
        $this->assertInstanceOf(Profile::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/login';
        $this->assertInstanceOf(Login::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/logout';
        $this->assertInstanceOf(Logout::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/unknown';
        $handler = $router->getHandler();
        $this->assertIsObject($handler);
        $this->assertInstanceOf(Handler::class, $handler);

        unset($_SERVER['PATH_INFO']);
        $this->assertNull($router->getHandler());
    }
}