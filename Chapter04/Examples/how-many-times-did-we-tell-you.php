<?php

declare(strict_types=1);

function howManyTimesDidWeTellYou(int $numberOfTimes): string
{
    return "You told me {$numberOfTimes} times";
}

echo "Should be 1: " . howManyTimesDidWeTellYou(1);
echo "\n";
echo "Should be 3: " . howManyTimesDidWeTellYou(3);
