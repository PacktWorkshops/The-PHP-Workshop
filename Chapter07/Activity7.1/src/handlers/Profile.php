<?php declare(strict_types=1);

namespace Handlers;

use Components\Auth;
use Components\Template;

class Profile extends Handler
{
    public function handle(): string
    {
        if (!Auth::userIsAuthenticated()) {
            return (new Login)->handle();
        }
        return (new Template('profile'))->render();
    }

    public function getTitle(): string
    {
        return 'Profile - ' . parent::getTitle();
    }
}
