<?php declare(strict_types=1);

namespace Handlers;

use Components\Auth;

class Logout extends Handler
{
    public function handle(): string
    {
        Auth::logout();
        $this->requestRedirect('/');
        return '';
    }
}
