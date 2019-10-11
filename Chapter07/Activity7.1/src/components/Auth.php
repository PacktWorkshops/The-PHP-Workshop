<?php declare(strict_types=1);

namespace Components;

use DateTime;
use Models\User;

class Auth
{
    public static function userIsAuthenticated(): bool
    {
        return isset($_SESSION['userid']);
    }

    public static function getLastLogin(): DateTime
    {
        return DateTime::createFromFormat('U', (string)($_SESSION['loginTime'] ?? ''));
    }

    public static function getUser(): ?User
    {
        if (self::userIsAuthenticated()) {
            return Database::instance()->getUserById((int)$_SESSION['userid']);
        }
        return null;
    }

    public static function authenticate(int $id)
    {
        $_SESSION['userid'] = $id;
        $_SESSION['loginTime'] = time();
    }

    public static function logout()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = []; // clear the stored values in current call $_SESSION
            session_regenerate_id(true);
            session_destroy();
        }
    }
}
