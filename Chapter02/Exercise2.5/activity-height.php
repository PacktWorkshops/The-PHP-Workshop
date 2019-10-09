<?php
// get all arguments
$name = $argv[1];
$heightMeters = (int) $argv[2];
$heightCentiMeters = (int) $argv[3];

// convert centimeters to meters
$cmToMeter = (float)($heightCentiMeters/100);

$finalHeightInMeters = $heightMeters + $cmToMeter;

// display the output
echo $name . ': ' . $finalHeightInMeters . 'm';