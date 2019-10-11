<?php

$exceptionHandler = function (Throwable $e) {
    static $fh;
    if (is_null($fh)) {
        $fh = fopen(__DIR__ . '/app.log', 'a');
        if (!$fh) {
            echo 'Unable to access the log file.', PHP_EOL;
            exit(1);
        }
    }
    $message = sprintf('%s [%d]: %s', get_class($e), $e->getCode(), $e->getMessage());
    $msgLength = mb_strlen($message);
    $line = str_repeat('-', $msgLength);
    $logMessage = sprintf(
        "%s\n%s\n> File: %s\n> Line: %d\n> Trace: %s\n%s\n",
        $line,
        $message,
        $e->getFile(),
        $e->getLine(),
        $e->getTraceAsString(),
        $line
    );
    fwrite($fh, $logMessage);
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

class NotANumber extends Exception
{
}

class DecimalNumber extends Exception
{
}

class NumberIsZeroOrNegative extends Exception
{
}

function printError(string $message): void
{
    echo '(!) ', $message, PHP_EOL;
}

function calculateFactorial($number): int
{
    if (!is_numeric($number)) {
        throw new NotANumber(sprintf('%s is not a number.', $number));
    }
    $number = $number * 1;
    if (is_float($number)) {
        throw new DecimalNumber(sprintf('%s is decimal; integer is expected.', $number));
    }
    if ($number < 1) {
        throw new NumberIsZeroOrNegative(sprintf('Given %d while higher than zero is expected.', $number));
    }
    $factorial = 1;
    for ($i = 2; $i <= $number; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

$arguments = array_slice($argv, 1);
if (!count($arguments)) {
    printError('At least one number is required.');
} else {
    foreach ($arguments as $argument) {
        try {
            $factorial = calculateFactorial($argument);
            echo $argument, '! = ', $factorial, PHP_EOL;
        } catch (NotANumber | DecimalNumber | NumberIsZeroOrNegative $e) {
            printError(sprintf('[%s]: %s', get_class($e), $e->getMessage()));
        } catch (Throwable $e) {
            printError("Unexpected error occured for [$argument] input number.");
            $exceptionHandler($e);
        }
    }
}
