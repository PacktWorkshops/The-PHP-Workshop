<?php

function average(): float
{
    $count = func_num_args();

    if (0 === $count) {
        throw new DomainException('Cannot calculate an average without input.');
    }

    $total = 0;

    foreach (func_get_args() as $number) {
        if (false === is_numeric($number)) {
            throw new DomainException('You can only calculate the average of numbers, a value that is not a number was given.');
        }

        $total += $number;
    }

    return $total / $count;
}
