<?php

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
