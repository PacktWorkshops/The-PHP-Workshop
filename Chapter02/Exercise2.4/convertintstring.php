<?php
echo '<h3>int to string:</h3>';
$number = 1234;

echo '<h3>Before type conversion:</h3>';
var_dump($number);

echo '<h3>After type conversion:</h3>';
$stringValue = (string) ($number);
var_dump($stringValue);