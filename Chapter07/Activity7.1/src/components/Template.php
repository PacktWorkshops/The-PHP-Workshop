<?php declare(strict_types=1);

namespace Components;

class Template
{
    public static $viewsPath = __DIR__ . '/../templates';

    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    private function getFilepath(): string
    {
        return self::$viewsPath . DIRECTORY_SEPARATOR . $this->name . '.php';
    }

    function render(array $data = []): string
    {
        extract($data, EXTR_OVERWRITE);
        ob_start();
        require $this->getFilepath();
        $rendered = ob_get_clean();
        return (string)$rendered;
    }
}
