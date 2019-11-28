<?php declare(strict_types=1);

namespace Handlers;

use Components\Auth;
use Components\Database;
use Components\Template;

class Login extends Handler
{
    public function handle(): string
    {
        if (Auth::userIsAuthenticated()) {
            $this->requestRedirect('/profile');
            return '';
        }
        $formError = [];
        if (count($_POST)) {
            $formUsername = $_POST['username'] ?? '';
            $formPassword = $_POST['password'] ?? '';
            $user = Database::instance()->getUserByUsername($formUsername);
            if (!$user) {
                $formError = ['username' => sprintf('The username [%s] was not found.', $formUsername)];
            } elseif (!$user->passwordMatches($formPassword)) {
                $formError = ['password' => 'The provided password is invalid.'];
            } else {
                Auth::authenticate((int)$user->getId());
                $this->requestRedirect('/profile');
                return '';
            }
        }

        return (new Template('login-form'))->render([
            'formError' => $formError,
            'formUsername' => $formUsername ?? ''
        ]);
    }
}
