<?php

set_exception_handler(function (Throwable $e) {
    $msgLength = mb_strlen($e->getMessage());
    $line = str_repeat('-', $msgLength);
    echo $line, PHP_EOL;
    echo $e->getMessage(), PHP_EOL;
    echo '> File: ', $e->getFile(), PHP_EOL;
    echo '> Line: ', $e->getLine(), PHP_EOL;
    echo '> Trace: ', PHP_EOL, $e->getTraceAsString(), PHP_EOL;
    echo $line, PHP_EOL;
});
