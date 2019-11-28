<?php

$exceptionHandler = function (Throwable $e) {
    $message = sprintf('%s [%d]: %s', get_class($e), $e->getCode(), $e->getMessage());
    $msgLength = mb_strlen($message);
    $line = str_repeat('-', $msgLength);
    echo $line, PHP_EOL;
    echo $message, PHP_EOL;
    echo '> File: ', $e->getFile(), PHP_EOL;
    echo '> Line: ', $e->getLine(), PHP_EOL;
    echo '> Trace: ', PHP_EOL, $e->getTraceAsString(), PHP_EOL;
    echo $line, PHP_EOL;
};

$errorHandler = function (int $code, string $message, string $file, int $line) use ($exceptionHandler) {
    $exception = new ErrorException($message, $code, $code, $file, $line);
    $exceptionHandler($exception);
    if (in_array($code, [E_ERROR, E_RECOVERABLE_ERROR, E_USER_ERROR])) {
        exit(1);
    }
};

set_error_handler($errorHandler);
set_exception_handler($exceptionHandler);
