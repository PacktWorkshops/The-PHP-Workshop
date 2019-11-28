<?php

require_once 'err-common/all-errors-handler.php';

class Disposable extends Exception
{
}

function handle(array $input)
{
    if (!isset($input[1])) {
        throw new Disposable('A class name is required as the first argument (one of DateTime or DateTimeImmutable).');
    }
    $calleeName = $input[1];
    if (!in_array($calleeName, [DateTime::class, DateTimeImmutable::class])) {
        throw new Disposable('One of DateTime or DateTimeImmutable is expected.');
    }
    $time = $input[2] ?? 'now';
    $timezone = $input[3] ?? 'UTC';
    try {
        $dateTimeZone = new DateTimeZone($timezone);
    } catch (Exception $e) {
        throw new Disposable(sprintf('Unknown/Bad timezone: [%s]', $timezone));
    }
    try {
        $dateTime = new $calleeName($time, $dateTimeZone);
    } catch (Exception $e) {
        throw new Disposable(sprintf('Cannot build date from [%s]', $time));
    }
    return $dateTime;
}

try {
    $output = handle($argv);
    echo 'Result: ', print_r($output, true);
} catch (Disposable $e) {
    echo '(!) ', $e->getMessage(), PHP_EOL;
    exit(1);
}
