<?php declare(strict_types=1);

namespace Models;

use DateTime;

class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var DateTime */
    private $signupTime;

    public function __construct(array $input)
    {
        $this->id = (int)($input['id'] ?? 0);
        $this->username = (string)($input['username'] ?? '');
        $this->password = (string)($input['password'] ?? '');
        $this->signupTime = new DateTime($input['signup_time'] ?? 'now', new \DateTimeZone('UTC'));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getSignupTime(): DateTime
    {
        return $this->signupTime;
    }

    public function passwordMatches(string $formPassword): bool
    {
        return password_verify($formPassword, $this->password);
    }
}
