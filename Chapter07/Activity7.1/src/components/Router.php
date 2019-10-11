<?php declare(strict_types=1);

namespace Components;

use Handlers\Contacts;
use Handlers\Handler;
use Handlers\Login;
use Handlers\Logout;
use Handlers\Profile;
use Handlers\Signup;

class Router
{
    public function getHandler(): ?Handler
    {
        switch ($_SERVER['PATH_INFO'] ?? '/') {
            case '/signup':
                return new Signup();
            case '/contacts':
                return new Contacts();
            case '/profile':
                return new Profile();
            case '/login':
                return new Login();
            case '/logout':
                return new Logout();
            case '/':
                return new class extends Handler
                {
                    public function handle(): string
                    {
                        if (Auth::userIsAuthenticated()) {
                            $this->requestRedirect('/profile');
                        }
                        return (new Template('home'))->render();
                    }
                };
            default:
                return new class extends Handler
                {
                    public function handle(): string
                    {
                        $this->requestRedirect('/');
                        return '';
                    }
                };
        }
    }
}
