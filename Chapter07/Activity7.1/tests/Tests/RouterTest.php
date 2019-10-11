<?php declare(strict_types=1);

namespace Tests;

use Components\Router;
use Handlers\Contacts;
use Handlers\Handler;
use Handlers\Login;
use Handlers\Logout;
use Handlers\Profile;
use Handlers\Signup;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetHandler()
    {
        $router = new Router();

        $_SERVER['PATH_INFO'] = '/profile';
        $this->assertInstanceOf(Profile::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/login';
        $this->assertInstanceOf(Login::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/logout';
        $this->assertInstanceOf(Logout::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/signup';
        $this->assertInstanceOf(Signup::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/contacts';
        $this->assertInstanceOf(Contacts::class, $router->getHandler());

        $_SERVER['PATH_INFO'] = '/unknown';
        $handler = $router->getHandler();
        $handler->handle();
        $this->assertIsObject($handler);
        $this->assertInstanceOf(Handler::class, $handler);
        $this->assertTrue($handler->willRedirect());

        $_SERVER['PATH_INFO'] = '/';
        $handlerSlash = $router->getHandler();
        $this->assertIsObject($handlerSlash);
        $this->assertInstanceOf(Handler::class, $handlerSlash);

        unset($_SERVER['PATH_INFO']);
        $handlerDefault = $router->getHandler();
        $this->assertIsObject($handlerSlash);
        $this->assertInstanceOf(Handler::class, $handlerSlash);
        $this->assertEquals($handlerSlash, $handlerDefault);
    }
}