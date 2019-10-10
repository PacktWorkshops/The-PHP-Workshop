<?php declare(strict_types=1);

namespace Handlers;

class Logout extends Handler
{
    public function handle(): string
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
            session_destroy();
        }
        $this->requestRedirect('/');
        return '';
    }
}
