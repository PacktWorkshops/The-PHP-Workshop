<?php

class InvalidEmail extends Exception
{
    private $context = [];

    public function setContext(array $context)
    {
        $this->context = $context;
    }

    public function getContext(): array
    {
        return $this->context;
    }
}

function validateEmail(array $input)
{
    if (!isset($input[1])) {
        throw new InvalidArgumentException('No value to check.');
    }
    $testInput = $input[1];
    if (!filter_var($testInput, FILTER_VALIDATE_EMAIL)) {
        $error = new InvalidEmail('The email validation has failed.');
        $error->setContext(['testValue' => $testInput]);
        throw $error;
    }
}

try {
    validateEmail($argv);
    echo 'The input value is valid email.', PHP_EOL;
} catch (Throwable $e) {
    echo sprintf(
            'Caught [%s]: %s (file: %s, line: %s, context: %s)',
            get_class($e),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $e instanceof InvalidEmail ? json_encode($e->getContext()) : 'N/A'
        ) . PHP_EOL;
}
