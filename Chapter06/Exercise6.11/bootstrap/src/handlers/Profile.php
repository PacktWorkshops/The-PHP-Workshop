<?php
declare(strict_types=1);

namespace Handlers;

class Profile extends Handler
{
    public function handle(): string
    {
        if (!array_key_exists('username', $_SESSION)) {
            return (new Login)->handle();
        }
        return (new \Components\Template('profile'))->render([
            'username' => $_SESSION['username'],
            'sessionData' => var_export($_SESSION, true),
        ]);
    }

    public function getTitle(): string
    {
        return 'Profile - ' . parent::getTitle();
    }
}
