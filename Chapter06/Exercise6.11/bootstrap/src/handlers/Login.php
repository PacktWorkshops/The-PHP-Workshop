<?php declare(strict_types=1);

namespace Handlers;

class Login extends Handler
{
    public function handle(): string
    {
        if (isset($_SESSION['username'])) {
            $this->requestRedirect('/');
            return '';
        }
        $username = 'admin';
        // for convenience, generate password hash with command line
        // > php -r "echo password_hash('admin', PASSWORD_BCRYPT);"
        $passwordHash = '$2y$10$Y09UvSz2tQCw/454Mcuzzuo8ARAjzAGGf8OPGeBloO7j47Fb2v.lu'; // "admin" password hash

        $formError = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formUsername = $_POST['username'] ?? '';
            $formPassword = $_POST['password'] ?? '';
            if ($formUsername !== $username) {
                $formError = ['username' => sprintf('The username [%s] was not found.', $formUsername)];
            } elseif (!password_verify($formPassword, $passwordHash)) {
                $formError = ['password' => 'The provided password is invalid.'];
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['loginTime'] = date(\DATE_COOKIE);
                $this->requestRedirect('/profile');
                return '';
            }
        }

        return (new \Components\Template('login-form'))->render([
            'formError' => $formError,
            'formUsername' => $formUsername ?? ''
        ]);
    }
}
