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
        $formError = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formUsername = $_POST['username'] ?? '';
            $formPassword = $_POST['password'] ?? '';
            $userData = $this->getUserData($formUsername);
            if (!$userData) {
                $formError = ['username' => sprintf('The username [%s] was not found.', $formUsername)];
            } elseif (!password_verify($formPassword, $userData['password'])) {
                $formError = ['password' => 'The provided password is invalid.'];
            } else {
                $_SESSION['username'] = $formUsername;
                $_SESSION['userdata'] = $userData;
                $this->requestRedirect('/profile');
                return '';
            }
        }

        return (new \Components\Template('login-form'))->render([
            'formError' => $formError,
            'formUsername' => $formUsername ?? ''
        ]);
    }

    private function getUserData(string $username): ?array
    {
        $users = [
            'vip' => [
                'level' => 'VIP',
                'password' => '$2y$10$JmCj4KVnBizmy6WS3I/bXuYM/yEI3dRg/IYkGdqHrBlOu4FKOliMa', // "vip" password hash
            ],
            'user' => [
                'level' => 'STANDARD',
                'password' => '$2y$10$QONapyews4J75ijOsPcjH.iJ4bHd09hf1bD5b0BsDNMKkK/fn130y', // "user" password hash
            ],
        ];
        return $users[$username] ?? null;
    }
}
