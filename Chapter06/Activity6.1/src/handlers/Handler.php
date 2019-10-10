<?php declare(strict_types=1);

namespace Handlers;

abstract class Handler
{
    private $redirectUri = '';

    abstract public function handle(): string;

    public function getTitle(): string
    {
        return 'Learning PHP';
    }

    public function requestRedirect(string $uri)
    {
        $this->redirectUri = $uri;
        header("Location: $uri", true);
    }

    public function willRedirect(): bool
    {
        return strlen($this->redirectUri) > 0;
    }
}
