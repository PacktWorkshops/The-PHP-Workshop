<?php

$errorHandler = function (int $code, string $message, string $file, int $line) {
    echo date(DATE_W3C), " :: $message, in [$file] on line [$line] (error code $code)", PHP_EOL;
    if ($code === E_USER_ERROR) {
        exit(1);
    }
};

set_error_handler($errorHandler, E_ALL);

return $errorHandler;
