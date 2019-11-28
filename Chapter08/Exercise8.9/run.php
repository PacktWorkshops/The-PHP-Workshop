<?php

require_once 'err-common/all-errors-handler.php';

class Disposable extends Exception
{
}

function handle(array $input)
{
    if (!isset($input[1])) {
        throw new Disposable('A function/class name is required as the first argument.');
    }
    $calleeName = $input[1];
    $calleeArguments = array_slice($input, 2);
    if (function_exists($calleeName)) {
        return call_user_func_array($calleeName, $calleeArguments);
    } elseif (class_exists($calleeName)) {
        return new $calleeName(...$calleeArguments);
    } else {
        throw new Disposable(sprintf('The [%s] function or class does not exist.', $calleeName));
    }
}

try {
    $output = handle($argv);
    echo 'Result: ', $output ? print_r($output, true) : var_export($output, true), PHP_EOL;
} catch (Disposable $e) {
    echo '(!) ', $e->getMessage(), PHP_EOL;
    exit(1);
}
