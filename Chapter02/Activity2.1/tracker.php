<?php
$name = 'Joe';

$weightKg = 80;
$heightCm = 180;

$heightMeters = $heightCm/100;

$heightSquared = $heightMeters * $heightMeters;

$bmi = $weightKg / ($heightSquared);

echo "<p>Hello $name, your BMI is $bmi</p>";