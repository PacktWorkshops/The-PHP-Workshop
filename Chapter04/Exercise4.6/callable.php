<?php
$a = 15;

$callable = function() use ($a) {
return $a;
};

$a = 'different';

echo $callable();

echo PHP_EOL;